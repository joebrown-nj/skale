<?php

/*
How to run
php import-service-page.php --file=service-detail.html  --slug=growth-infrastructure  --name="Growth Infrastructure"  --dry-run
*/

declare(strict_types=1);

use App\Core\Application;
use Doctrine\ORM\EntityManager;

require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Service-page HTML importer
 *
 * Targets these tables:
 *   service_pages
 *   service_page_sections
 *   service_section_items
 *   service_section_buttons
 *   forms
 *   form_fields
 *   form_field_options
 *   service_section_forms
 *
 * Usage:
 *   php import-service-page.php \
 *     --file=/path/to/service-detail.html \
 *     --slug=growth-infrastructure \
 *     --name="Growth Infrastructure" \
 *     --replace
 *
 * Optional:
 *   --status=draft|published|archived
 *   --template=service-detail
 *   --dry-run
 */

final class ServicePageImporter
{
    private DOMXPath $xpath;
    private DOMDocument $dom;
    private int $pageId = 0;
    private bool $dryRun;

    public function __construct(
        private readonly ?PDO $pdo,
        private readonly string $html,
        private readonly string $slug,
        private readonly string $name,
        private readonly string $status = 'draft',
        private readonly string $template = 'service-detail',
        private readonly bool $replace = false,
        bool $dryRun = false,
    ) {
        $this->dryRun = $dryRun;
        $this->dom = new DOMDocument('1.0', 'UTF-8');

        libxml_use_internal_errors(true);
        $loaded = $this->dom->loadHTML(
            '<?xml encoding="UTF-8">' . $html,
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        $errors = libxml_get_errors();
        libxml_clear_errors();

        if (!$loaded) {
            throw new RuntimeException('The HTML file could not be parsed.');
        }

        if ($errors !== []) {
            fwrite(STDERR, "Warning: DOMDocument recovered from " . count($errors) . " HTML parsing issue(s).\n");
        }

        $this->xpath = new DOMXPath($this->dom);
    }

    public function import(): array
    {
        $summary = [
            'page_id' => null,
            'sections' => 0,
            'items' => 0,
            'buttons' => 0,
            'forms' => 0,
            'fields' => 0,
            'options' => 0,
        ];

        if (!$this->dryRun) {
            $this->pdo->beginTransaction();
        }

        try {
            $existingId = $this->findExistingPageId();

            if ($existingId !== null && !$this->replace) {
                throw new RuntimeException(
                    "A service page with slug '{$this->slug}' already exists. Run again with --replace to overwrite it."
                );
            }

            if ($existingId !== null && $this->replace && !$this->dryRun) {
                $this->deletePage($existingId);
            }

            $this->pageId = $this->dryRun ? 1 : $this->insertPage();
            $summary['page_id'] = $this->pageId;

            $sections = $this->query('//main/section');
            $sortOrder = 10;

            foreach ($sections as $sectionNode) {
                if (!$sectionNode instanceof DOMElement) {
                    continue;
                }

                $sectionData = $this->parseSection($sectionNode, $sortOrder);
                $sortOrder += 10;

                if ($sectionData === null) {
                    fwrite(STDERR, "Skipping an unrecognized section with classes: {$sectionNode->getAttribute('class')}\n");
                    continue;
                }

                $sectionId = $this->dryRun ? $summary['sections'] + 1 : $this->insertSection($sectionData['section']);
                $summary['sections']++;

                $parentMap = [];
                foreach ($sectionData['items'] as $index => $item) {
                    $parentImportKey = $item['parent_import_key'] ?? null;
                    unset($item['parent_import_key']);

                    if ($parentImportKey !== null && isset($parentMap[$parentImportKey])) {
                        $item['parent_item_id'] = $parentMap[$parentImportKey];
                    }

                    $itemId = $this->dryRun ? $summary['items'] + 1 : $this->insertItem($sectionId, $item);
                    $summary['items']++;

                    if (isset($item['import_key'])) {
                        $parentMap[$item['import_key']] = $itemId;
                    }
                }

                foreach ($sectionData['buttons'] as $button) {
                    if (!$this->dryRun) {
                        $this->insertButton($sectionId, $button);
                    }
                    $summary['buttons']++;
                }

                if ($sectionData['form'] !== null) {
                    if (!$this->dryRun) {
                        $formId = $this->insertForm($sectionData['form']['form']);
                        $this->linkFormToSection($sectionId, $formId);

                        foreach ($sectionData['form']['fields'] as $field) {
                            $options = $field['options'];
                            unset($field['options']);
                            $fieldId = $this->insertFormField($formId, $field);
                            $summary['fields']++;

                            foreach ($options as $option) {
                                $this->insertFormFieldOption($fieldId, $option);
                                $summary['options']++;
                            }
                        }
                    } else {
                        foreach ($sectionData['form']['fields'] as $field) {
                            $summary['fields']++;
                            $summary['options'] += count($field['options']);
                        }
                    }
                    $summary['forms']++;
                }
            }

            if (!$this->dryRun) {
                $this->pdo->commit();
            }

            return $summary;
        } catch (Throwable $e) {
            if (!$this->dryRun && $this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            throw $e;
        }
    }

    private function parseSection(DOMElement $section, int $sortOrder): ?array
    {
        $class = $section->getAttribute('class');

        if ($this->hasClass($section, 'hero')) {
            return $this->parseHero($section, $sortOrder);
        }
        if ($this->hasClass($section, 'trust-strip')) {
            return $this->parseTrustStrip($section, $sortOrder);
        }
        if ($this->first($section, './/article[contains(concat(" ", normalize-space(@class), " "), " problem-card ")]')) {
            return $this->parseCardGrid($section, $sortOrder, 'problems', 'problem-card');
        }
        if ($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " outcome-panel ")]')) {
            return $this->parseOutcomePanel($section, $sortOrder);
        }
        if ($this->first($section, './/article[contains(concat(" ", normalize-space(@class), " "), " service-card ")]')) {
            return $this->parseServiceGrid($section, $sortOrder);
        }
        if ($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " case-study ")]')) {
            return $this->parseCaseStudy($section, $sortOrder);
        }
        if ($section->getAttribute('id') === 'how-it-works' || $this->first($section, './/article[contains(concat(" ", normalize-space(@class), " "), " process-card ")]')) {
            return $this->parseProcess($section, $sortOrder);
        }
        if ($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " founder-panel ")]')) {
            return $this->parseFounder($section, $sortOrder);
        }
        if ($this->text($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " eyebrow ")]')) === 'Who This Is For') {
            return $this->parseQualification($section, $sortOrder);
        }
        if ($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " accordion ")]')) {
            return $this->parseFaq($section, $sortOrder);
        }
        if ($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " final-cta ")]')) {
            return $this->parseFinalCta($section, $sortOrder);
        }

        return null;
    }

    private function parseHero(DOMElement $section, int $sortOrder): array
    {
        $copy = $this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " hero-copy ")]');
        $heading = $this->first($copy, './/h1');
        [$headingText, $highlightText] = $this->headingAndHighlight($heading);
        $note = $this->first($copy, './/*[contains(concat(" ", normalize-space(@class), " "), " hero-note ")]');

        $items = [];
        $i = 10;
        foreach ($this->query('.//ul[contains(concat(" ", normalize-space(@class), " "), " hero-checks ")]/li', $copy) as $li) {
            $items[] = [
                'item_type' => 'hero_benefit',
                'sort_order' => $i,
                'title' => $this->textWithoutIcons($li),
                'icon_class' => $this->iconClass($li),
            ];
            $i += 10;
        }

        $form = $this->first($section, './/form');

        return [
            'section' => [
                'section_key' => 'hero',
                'section_type' => 'hero',
                'sort_order' => $sortOrder,
                'eyebrow' => $this->text($this->first($copy, './/*[contains(concat(" ", normalize-space(@class), " "), " eyebrow ")]')),
                'heading' => $headingText,
                'subheading' => $this->text($this->first($copy, './/*[contains(concat(" ", normalize-space(@class), " "), " hero-lead ")]')),
                'body' => $this->text($note),
                'html_id' => $section->getAttribute('id') ?: null,
                'css_class' => $section->getAttribute('class'),
                'settings' => [
                    'highlight_text' => $highlightText,
                    'note_icon' => $this->iconClass($note),
                    'content_column' => $this->nearestColumnClass($copy),
                    'form_column' => $form ? $this->nearestColumnClass($form) : null,
                ],
            ],
            'items' => $items,
            'buttons' => $this->parseButtons($copy),
            'form' => $form ? $this->parseForm($form) : null,
        ];
    }

    private function parseTrustStrip(DOMElement $section, int $sortOrder): array
    {
        $items = [];
        $i = 10;
        foreach ($this->query('.//*[contains(concat(" ", normalize-space(@class), " "), " trust-item ")]', $section) as $node) {
            $items[] = [
                'item_type' => 'trust_item',
                'sort_order' => $i,
                'title' => $this->text($this->first($node, './/strong')),
                'subtitle' => $this->text($this->first($node, './/span[not(contains(concat(" ", normalize-space(@class), " "), " icon-box "))]')),
                'icon_class' => $this->iconClass($node),
            ];
            $i += 10;
        }

        return [
            'section' => [
                'section_key' => 'trust',
                'section_type' => 'trust_strip',
                'sort_order' => $sortOrder,
                'heading' => $section->getAttribute('aria-label') ?: null,
                'css_class' => $section->getAttribute('class'),
                'settings' => [],
            ],
            'items' => $items,
            'buttons' => [],
            'form' => null,
        ];
    }

    private function parseCardGrid(DOMElement $section, int $sortOrder, string $key, string $cardClass): array
    {
        $intro = $this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " section-intro ")]');
        $items = [];
        $i = 10;
        foreach ($this->query('.//article[contains(concat(" ", normalize-space(@class), " "), " ' . $cardClass . ' ")]', $section) as $card) {
            $items[] = [
                'item_type' => 'card',
                'sort_order' => $i,
                'title' => $this->text($this->first($card, './/h3')),
                'body' => $this->text($this->first($card, './/p')),
                'icon_class' => $this->iconClass($card),
                'settings' => ['column_class' => $this->nearestColumnClass($card)],
            ];
            $i += 10;
        }

        return [
            'section' => $this->baseSection($section, $intro, $key, 'card_grid', $sortOrder, [
                'card_style' => $cardClass,
            ]),
            'items' => $items,
            'buttons' => $this->parseButtons($section),
            'form' => null,
        ];
    }

    private function parseOutcomePanel(DOMElement $section, int $sortOrder): array
    {
        $panel = $this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " outcome-panel ")]');
        $items = [];
        $i = 10;
        foreach ($this->query('.//ul[contains(concat(" ", normalize-space(@class), " "), " outcome-list ")]/li', $panel) as $li) {
            $items[] = [
                'item_type' => 'outcome',
                'sort_order' => $i,
                'title' => $this->text($this->first($li, './/strong')),
                'subtitle' => $this->text($this->first($li, './/span')),
                'icon_class' => $this->iconClass($li),
            ];
            $i += 10;
        }

        return [
            'section' => [
                'section_key' => 'outcomes',
                'section_type' => 'outcome_panel',
                'sort_order' => $sortOrder,
                'eyebrow' => $this->text($this->first($panel, './/*[contains(concat(" ", normalize-space(@class), " "), " eyebrow ")]')),
                'heading' => $this->text($this->first($panel, './/h2')),
                'body' => $this->text($this->first($panel, './/p')),
                'css_class' => $section->getAttribute('class'),
                'settings' => [],
            ],
            'items' => $items,
            'buttons' => [],
            'form' => null,
        ];
    }

    private function parseServiceGrid(DOMElement $section, int $sortOrder): array
    {
        $heading = $this->first($section, './/h2');
        $headingColumn = $heading ? $heading->parentNode : null;
        $introBody = null;
        if ($headingColumn && $headingColumn->parentNode instanceof DOMNode) {
            $paragraphs = $this->query('./div[contains(@class,"col-")]/p', $headingColumn->parentNode);
            $introBody = $paragraphs->length > 0 ? $this->text($paragraphs->item(0)) : null;
        }

        $items = [];
        $cardOrder = 10;
        $cardIndex = 1;
        foreach ($this->query('.//article[contains(concat(" ", normalize-space(@class), " "), " service-card ")]', $section) as $card) {
            $importKey = 'service-card-' . $cardIndex;
            $items[] = [
                'import_key' => $importKey,
                'item_type' => 'service_card',
                'sort_order' => $cardOrder,
                'number_label' => $this->text($this->first($card, './/*[contains(concat(" ", normalize-space(@class), " "), " service-number ")]')),
                'title' => $this->text($this->first($card, './/h3')),
                'body' => $this->text($this->first($card, './p')),
                'icon_class' => $this->iconClass($card),
                'settings' => ['column_class' => $this->nearestColumnClass($card)],
            ];

            $bulletOrder = 10;
            foreach ($this->query('.//ul/li', $card) as $li) {
                $items[] = [
                    'parent_import_key' => $importKey,
                    'item_type' => 'bullet',
                    'sort_order' => $bulletOrder,
                    'title' => $this->textWithoutIcons($li),
                    'icon_class' => $this->iconClass($li),
                ];
                $bulletOrder += 10;
            }

            $cardOrder += 10;
            $cardIndex++;
        }

        return [
            'section' => [
                'section_key' => 'components',
                'section_type' => 'service_grid',
                'sort_order' => $sortOrder,
                'eyebrow' => $this->text($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " eyebrow ")]')),
                'heading' => $this->text($heading),
                'body' => $introBody,
                'css_class' => $section->getAttribute('class'),
                'settings' => [],
            ],
            'items' => $items,
            'buttons' => $this->parseButtons($section),
            'form' => null,
        ];
    }

    private function parseCaseStudy(DOMElement $section, int $sortOrder): array
    {
        $case = $this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " case-study ")]');
        $paragraphs = $this->query('.//div[contains(@class,"col-lg-6")][1]/p', $case);
        $bodyParts = [];
        foreach ($paragraphs as $p) {
            $bodyParts[] = $this->text($p);
        }

        $items = [];
        $i = 10;
        foreach ($this->query('.//*[contains(concat(" ", normalize-space(@class), " "), " metric ")]', $case) as $metric) {
            $items[] = [
                'item_type' => 'metric',
                'sort_order' => $i,
                'metric_value' => $this->text($this->first($metric, './/strong')),
                'metric_label' => $this->text($this->first($metric, './/span')),
                'settings' => ['column_class' => $this->nearestColumnClass($metric)],
            ];
            $i += 10;
        }

        return [
            'section' => [
                'section_key' => 'case-study',
                'section_type' => 'case_study',
                'sort_order' => $sortOrder,
                'eyebrow' => $this->text($this->first($case, './/*[contains(concat(" ", normalize-space(@class), " "), " case-label ")]')),
                'heading' => $this->text($this->first($case, './/h2')),
                'body' => implode("\n\n", array_filter($bodyParts)),
                'css_class' => $section->getAttribute('class'),
                'settings' => [],
            ],
            'items' => $items,
            'buttons' => $this->parseButtons($case),
            'form' => null,
        ];
    }

    private function parseProcess(DOMElement $section, int $sortOrder): array
    {
        $intro = $this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " section-intro ")]');
        $items = [];
        $i = 10;
        foreach ($this->query('.//article[contains(concat(" ", normalize-space(@class), " "), " process-card ")]', $section) as $card) {
            $items[] = [
                'item_type' => 'process_step',
                'sort_order' => $i,
                'number_label' => $this->text($this->first($card, './/*[contains(concat(" ", normalize-space(@class), " "), " process-step ")]')),
                'title' => $this->text($this->first($card, './/h3')),
                'body' => $this->text($this->first($card, './/p')),
                'settings' => ['column_class' => $this->nearestColumnClass($card)],
            ];
            $i += 10;
        }

        return [
            'section' => $this->baseSection($section, $intro, 'process', 'process', $sortOrder),
            'items' => $items,
            'buttons' => $this->parseButtons($section),
            'form' => null,
        ];
    }

    private function parseFounder(DOMElement $section, int $sortOrder): array
    {
        $panel = $this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " founder-panel ")]');
        $paragraphs = $this->query('.//p', $panel);
        $body = [];
        foreach ($paragraphs as $p) {
            $body[] = $this->text($p);
        }
        $avatar = $this->first($panel, './/*[contains(concat(" ", normalize-space(@class), " "), " founder-avatar ")]');

        return [
            'section' => [
                'section_key' => 'founder',
                'section_type' => 'founder',
                'sort_order' => $sortOrder,
                'heading' => $this->text($this->first($panel, './/h2')),
                'body' => implode("\n\n", array_filter($body)),
                'css_class' => $section->getAttribute('class'),
                'settings' => [
                    'avatar_text' => $this->text($avatar),
                    'avatar_label' => $avatar?->getAttribute('aria-label') ?: null,
                ],
            ],
            'items' => [],
            'buttons' => $this->parseButtons($panel),
            'form' => null,
        ];
    }

    private function parseQualification(DOMElement $section, int $sortOrder): array
    {
        $items = [];
        $i = 10;
        foreach ($this->query('.//i[contains(concat(" ", normalize-space(@class), " "), " bi-check-circle-fill ")]/parent::*', $section) as $item) {
            $items[] = [
                'item_type' => 'qualification',
                'sort_order' => $i,
                'title' => $this->text($this->first($item, './/strong')),
                'subtitle' => $this->text($this->first($item, './/span')),
                'icon_class' => $this->iconClass($item),
            ];
            $i += 10;
        }

        return [
            'section' => [
                'section_key' => 'qualification',
                'section_type' => 'qualification',
                'sort_order' => $sortOrder,
                'eyebrow' => $this->text($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " eyebrow ")]')),
                'heading' => $this->text($this->first($section, './/h2')),
                'css_class' => $section->getAttribute('class'),
                'settings' => [],
            ],
            'items' => $items,
            'buttons' => $this->parseButtons($section),
            'form' => null,
        ];
    }

    private function parseFaq(DOMElement $section, int $sortOrder): array
    {
        $items = [];
        $i = 10;
        foreach ($this->query('.//*[contains(concat(" ", normalize-space(@class), " "), " accordion-item ")]', $section) as $faq) {
            $button = $this->first($faq, './/button');
            $items[] = [
                'item_type' => 'faq',
                'sort_order' => $i,
                'title' => $this->text($button),
                'body' => $this->text($this->first($faq, './/*[contains(concat(" ", normalize-space(@class), " "), " accordion-body ")]')),
                'settings' => [
                    'open_by_default' => $button?->getAttribute('aria-expanded') === 'true',
                ],
            ];
            $i += 10;
        }

        $accordion = $this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " accordion ")]');
        $introColumn = $accordion?->parentNode?->previousSibling;
        while ($introColumn && !$introColumn instanceof DOMElement) {
            $introColumn = $introColumn->previousSibling;
        }

        return [
            'section' => [
                'section_key' => 'faq',
                'section_type' => 'faq',
                'sort_order' => $sortOrder,
                'eyebrow' => $this->text($this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " eyebrow ")]')),
                'heading' => $this->text($this->first($section, './/h2')),
                'body' => $this->text($this->first($section, './/p')),
                'css_class' => $section->getAttribute('class'),
                'settings' => [
                    'accordion_id' => $accordion?->getAttribute('id') ?: null,
                ],
            ],
            'items' => $items,
            'buttons' => [],
            'form' => null,
        ];
    }

    private function parseFinalCta(DOMElement $section, int $sortOrder): array
    {
        $cta = $this->first($section, './/*[contains(concat(" ", normalize-space(@class), " "), " final-cta ")]');
        $paragraphs = $this->query('.//p', $cta);

        return [
            'section' => [
                'section_key' => 'final-cta',
                'section_type' => 'final_cta',
                'sort_order' => $sortOrder,
                'eyebrow' => $this->text($this->first($cta, './/*[contains(concat(" ", normalize-space(@class), " "), " badge ")]')),
                'heading' => $this->text($this->first($cta, './/h2')),
                'subheading' => $paragraphs->length > 0 ? $this->text($paragraphs->item(0)) : null,
                'body' => $paragraphs->length > 1 ? $this->text($paragraphs->item($paragraphs->length - 1)) : null,
                'css_class' => $section->getAttribute('class'),
                'settings' => [],
            ],
            'items' => [],
            'buttons' => $this->parseButtons($cta),
            'form' => null,
        ];
    }

    private function parseForm(DOMElement $form): array
    {
        $card = $form->parentNode instanceof DOMElement ? $form->parentNode : $form;
        $intro = $this->first($card, './div[contains(concat(" ", normalize-space(@class), " "), " mb-4 ")]');
        $privacy = null;
        foreach ($this->query('./p', $form) as $p) {
            $privacy = $this->textWithoutIcons($p);
        }

        $formKey = $form->getAttribute('dataMetaFormName') ?: ($form->getAttribute('id') ?: $this->slug . '-form');
        $fields = [];
        $fieldOrder = 10;

        foreach ($this->query('.//input | .//select | .//textarea', $form) as $field) {
            if (!$field instanceof DOMElement) {
                continue;
            }

            $tag = strtolower($field->tagName);
            $type = $tag === 'input' ? strtolower($field->getAttribute('type') ?: 'text') : $tag;
            if (!in_array($type, ['text', 'email', 'tel', 'textarea', 'select', 'checkbox', 'radio', 'hidden'], true)) {
                $type = 'text';
            }

            $id = $field->getAttribute('id') ?: null;
            $label = $id ? $this->first($form, './/label[@for=' . $this->xpathLiteral($id) . ']') : null;
            $options = [];

            if ($type === 'select') {
                $optionOrder = 10;
                foreach ($this->query('./option', $field) as $option) {
                    if (!$option instanceof DOMElement) {
                        continue;
                    }
                    $labelText = $this->text($option);
                    $value = $option->hasAttribute('value') ? $option->getAttribute('value') : $labelText;
                    $options[] = [
                        'option_label' => $labelText,
                        'option_value' => $value,
                        'sort_order' => $optionOrder,
                        'is_default' => $option->hasAttribute('selected') ? 1 : 0,
                        'is_enabled' => $option->hasAttribute('disabled') ? 0 : 1,
                    ];
                    $optionOrder += 10;
                }
            }

            $fields[] = [
                'field_type' => $type,
                'field_name' => $field->getAttribute('name'),
                'field_id' => $id,
                'label' => $this->text($label),
                'placeholder' => $field->getAttribute('placeholder') ?: null,
                'default_value' => $type === 'textarea' ? $this->text($field) : ($field->getAttribute('value') ?: null),
                'autocomplete' => $field->getAttribute('autocomplete') ?: null,
                'help_text' => null,
                'grid_class' => $this->nearestColumnClass($field) ?: 'col-12',
                'css_class' => $field->getAttribute('class') ?: null,
                'is_required' => $field->hasAttribute('required') ? 1 : 0,
                'is_enabled' => $field->hasAttribute('disabled') ? 0 : 1,
                'sort_order' => $fieldOrder,
                'validation_rules' => array_filter([
                    'minlength' => $field->getAttribute('minlength') ?: null,
                    'maxlength' => $field->getAttribute('maxlength') ?: null,
                    'pattern' => $field->getAttribute('pattern') ?: null,
                ], static fn ($value) => $value !== null),
                'options' => $options,
            ];
            $fieldOrder += 10;
        }

        $submit = $this->first($form, './/button[@type="submit"] | .//input[@type="submit"]');
        $submitLabel = $submit instanceof DOMElement && strtolower($submit->tagName) === 'input'
            ? $submit->getAttribute('value')
            : $this->text($submit);

        return [
            'form' => [
                'name' => $this->text($this->first($intro, './/h2')) ?: $this->name . ' Form',
                'form_key' => $this->uniqueFormKey($formKey),
                'action_url' => $form->getAttribute('action') ?: '',
                'method' => strtoupper($form->getAttribute('method') ?: 'POST'),
                'heading' => $this->text($this->first($intro, './/h2')),
                'description' => $this->text($this->first($intro, './/p')),
                'badge_text' => $this->text($this->first($intro, './/*[contains(concat(" ", normalize-space(@class), " "), " badge ")]')),
                'submit_label' => $submitLabel ?: 'Submit',
                'success_message' => null,
                'privacy_text' => $privacy,
                'css_class' => $form->getAttribute('class') ?: null,
                'tracking_form_name' => $form->getAttribute('dataMetaFormName') ?: null,
                'tracking_success_event' => $form->getAttribute('dataMetaSuccessEvent') ?: null,
                'is_enabled' => 1,
            ],
            'fields' => $fields,
        ];
    }

    private function parseButtons(DOMNode $context): array
    {
        $buttons = [];
        $i = 10;
        foreach ($this->query('.//a[contains(concat(" ", normalize-space(@class), " "), " btn ")]', $context) as $link) {
            if (!$link instanceof DOMElement) {
                continue;
            }
            $classes = preg_split('/\s+/', trim($link->getAttribute('class'))) ?: [];
            $style = 'primary';
            foreach ($classes as $candidate) {
                if (str_starts_with($candidate, 'btn-') && $candidate !== 'btn-lg' && $candidate !== 'btn-sm') {
                    $style = substr($candidate, 4);
                    break;
                }
            }

            $buttons[] = [
                'button_key' => null,
                'label' => $this->textWithoutIcons($link),
                'url' => $link->getAttribute('href'),
                'style' => $style,
                'icon_class' => $this->iconClass($link),
                'sort_order' => $i,
                'opens_new_window' => $link->getAttribute('target') === '_blank' ? 1 : 0,
                'tracking_event' => $link->getAttribute('data-event') ?: null,
                'is_enabled' => 1,
            ];
            $i += 10;
        }
        return $buttons;
    }

    private function baseSection(
        DOMElement $section,
        ?DOMNode $intro,
        string $key,
        string $type,
        int $sortOrder,
        array $settings = []
    ): array {
        return [
            'section_key' => $key,
            'section_type' => $type,
            'sort_order' => $sortOrder,
            'eyebrow' => $this->text($this->first($intro, './/*[contains(concat(" ", normalize-space(@class), " "), " eyebrow ")]')),
            'heading' => $this->text($this->first($intro, './/h2')),
            'body' => $this->text($this->first($intro, './/p')),
            'html_id' => $section->getAttribute('id') ?: null,
            'css_class' => $section->getAttribute('class'),
            'settings' => $settings,
        ];
    }

    private function insertPage(): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO service_pages
                (name, slug, status, page_template, published_at)
             VALUES
                (:name, :slug, :status, :template, :published_at)'
        );
        $stmt->execute([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'template' => $this->template,
            'published_at' => $this->status === 'published' ? date('Y-m-d H:i:s') : null,
        ]);
        return (int) $this->pdo->lastInsertId();
    }

    private function insertSection(array $data): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO service_page_sections
                (service_page_id, section_key, section_type, sort_order, eyebrow, heading, subheading, body,
                 image_url, image_alt, background_style, css_class, html_id, is_enabled, settings)
             VALUES
                (:page_id, :section_key, :section_type, :sort_order, :eyebrow, :heading, :subheading, :body,
                 :image_url, :image_alt, :background_style, :css_class, :html_id, :is_enabled, :settings)'
        );
        $stmt->execute([
            'page_id' => $this->pageId,
            'section_key' => $data['section_key'],
            'section_type' => $data['section_type'],
            'sort_order' => $data['sort_order'],
            'eyebrow' => $data['eyebrow'] ?? null,
            'heading' => $data['heading'] ?? null,
            'subheading' => $data['subheading'] ?? null,
            'body' => $data['body'] ?? null,
            'image_url' => $data['image_url'] ?? null,
            'image_alt' => $data['image_alt'] ?? null,
            'background_style' => $data['background_style'] ?? null,
            'css_class' => $data['css_class'] ?? null,
            'html_id' => $data['html_id'] ?? null,
            'is_enabled' => $data['is_enabled'] ?? 1,
            'settings' => $this->json($data['settings'] ?? []),
        ]);
        return (int) $this->pdo->lastInsertId();
    }

    private function insertItem(int $sectionId, array $data): int
    {
        unset($data['import_key']);
        $stmt = $this->pdo->prepare(
            'INSERT INTO service_section_items
                (section_id, parent_item_id, item_type, sort_order, label, title, subtitle, body, icon_class,
                 number_label, image_url, image_alt, link_text, link_url, metric_value, metric_label,
                 is_enabled, settings)
             VALUES
                (:section_id, :parent_item_id, :item_type, :sort_order, :label, :title, :subtitle, :body,
                 :icon_class, :number_label, :image_url, :image_alt, :link_text, :link_url, :metric_value,
                 :metric_label, :is_enabled, :settings)'
        );
        $stmt->execute([
            'section_id' => $sectionId,
            'parent_item_id' => $data['parent_item_id'] ?? null,
            'item_type' => $data['item_type'] ?? 'item',
            'sort_order' => $data['sort_order'] ?? 0,
            'label' => $data['label'] ?? null,
            'title' => $data['title'] ?? null,
            'subtitle' => $data['subtitle'] ?? null,
            'body' => $data['body'] ?? null,
            'icon_class' => $data['icon_class'] ?? null,
            'number_label' => $data['number_label'] ?? null,
            'image_url' => $data['image_url'] ?? null,
            'image_alt' => $data['image_alt'] ?? null,
            'link_text' => $data['link_text'] ?? null,
            'link_url' => $data['link_url'] ?? null,
            'metric_value' => $data['metric_value'] ?? null,
            'metric_label' => $data['metric_label'] ?? null,
            'is_enabled' => $data['is_enabled'] ?? 1,
            'settings' => $this->json($data['settings'] ?? []),
        ]);
        return (int) $this->pdo->lastInsertId();
    }

    private function insertButton(int $sectionId, array $data): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO service_section_buttons
                (section_id, button_key, label, url, style, icon_class, sort_order, opens_new_window,
                 tracking_event, is_enabled)
             VALUES
                (:section_id, :button_key, :label, :url, :style, :icon_class, :sort_order,
                 :opens_new_window, :tracking_event, :is_enabled)'
        );
        $stmt->execute(['section_id' => $sectionId] + $data);
    }

    private function insertForm(array $data): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO forms
                (name, form_key, action_url, method, heading, description, badge_text, submit_label,
                 success_message, privacy_text, css_class, tracking_form_name, tracking_success_event, is_enabled)
             VALUES
                (:name, :form_key, :action_url, :method, :heading, :description, :badge_text, :submit_label,
                 :success_message, :privacy_text, :css_class, :tracking_form_name, :tracking_success_event, :is_enabled)'
        );
        $stmt->execute($data);
        return (int) $this->pdo->lastInsertId();
    }

    private function insertFormField(int $formId, array $data): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO form_fields
                (form_id, field_type, field_name, field_id, label, placeholder, default_value, autocomplete,
                 help_text, grid_class, css_class, is_required, is_enabled, sort_order, validation_rules)
             VALUES
                (:form_id, :field_type, :field_name, :field_id, :label, :placeholder, :default_value,
                 :autocomplete, :help_text, :grid_class, :css_class, :is_required, :is_enabled,
                 :sort_order, :validation_rules)'
        );
        $data['form_id'] = $formId;
        $data['validation_rules'] = $this->json($data['validation_rules'] ?? []);
        $stmt->execute($data);
        return (int) $this->pdo->lastInsertId();
    }

    private function insertFormFieldOption(int $fieldId, array $data): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO form_field_options
                (form_field_id, option_label, option_value, sort_order, is_default, is_enabled)
             VALUES
                (:form_field_id, :option_label, :option_value, :sort_order, :is_default, :is_enabled)'
        );
        $stmt->execute(['form_field_id' => $fieldId] + $data);
    }

    private function linkFormToSection(int $sectionId, int $formId): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO service_section_forms (section_id, form_id) VALUES (:section_id, :form_id)'
        );
        $stmt->execute(['section_id' => $sectionId, 'form_id' => $formId]);
    }

    private function findExistingPageId(): ?int
    {
        if ($this->dryRun) {
            return null;
        }
        $stmt = $this->pdo->prepare('SELECT id FROM service_pages WHERE slug = :slug LIMIT 1');
        $stmt->execute(['slug' => $this->slug]);
        $value = $stmt->fetchColumn();
        return $value === false ? null : (int) $value;
    }

    private function deletePage(int $pageId): void
    {
        // Forms are not deleted automatically because a form may be shared by another page.
        // This importer creates page-specific form keys, so remove orphaned forms after deleting the page.
        $stmt = $this->pdo->prepare(
            'SELECT ssf.form_id
             FROM service_section_forms ssf
             INNER JOIN service_page_sections s ON s.id = ssf.section_id
             WHERE s.service_page_id = :page_id'
        );
        $stmt->execute(['page_id' => $pageId]);
        $formIds = array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));

        $stmt = $this->pdo->prepare('DELETE FROM service_pages WHERE id = :id');
        $stmt->execute(['id' => $pageId]);

        foreach ($formIds as $formId) {
            $check = $this->pdo->prepare('SELECT COUNT(*) FROM service_section_forms WHERE form_id = :form_id');
            $check->execute(['form_id' => $formId]);
            if ((int) $check->fetchColumn() === 0) {
                $delete = $this->pdo->prepare('DELETE FROM forms WHERE id = :form_id');
                $delete->execute(['form_id' => $formId]);
            }
        }
    }

    private function uniqueFormKey(string $base): string
    {
        return $this->slug . '-' . preg_replace('/[^a-z0-9-]+/i', '-', strtolower(trim($base)));
    }

    private function headingAndHighlight(?DOMNode $heading): array
    {
        if (!$heading instanceof DOMElement) {
            return [null, null];
        }
        $highlight = $this->first($heading, './/*[contains(concat(" ", normalize-space(@class), " "), " text-highlight ")]');
        $highlightText = $this->text($highlight);
        $clone = $heading->cloneNode(true);
        if ($clone instanceof DOMElement) {
            $highlightClone = $this->first($clone, './/*[contains(concat(" ", normalize-space(@class), " "), " text-highlight ")]');
            $highlightClone?->parentNode?->removeChild($highlightClone);
            return [$this->text($clone), $highlightText];
        }
        return [$this->text($heading), $highlightText];
    }

    private function iconClass(?DOMNode $context): ?string
    {
        if (!$context) {
            return null;
        }
        $icon = $this->first($context, './/i');
        return $icon instanceof DOMElement ? ($icon->getAttribute('class') ?: null) : null;
    }

    private function nearestColumnClass(?DOMNode $node): ?string
    {
        while ($node instanceof DOMNode) {
            if ($node instanceof DOMElement) {
                $classes = preg_split('/\s+/', trim($node->getAttribute('class'))) ?: [];
                $columnClasses = array_values(array_filter(
                    $classes,
                    static fn (string $class): bool => preg_match('/^col(?:-|$)/', $class) === 1
                ));
                if ($columnClasses !== []) {
                    return implode(' ', $columnClasses);
                }
            }
            $node = $node->parentNode;
        }
        return null;
    }

    private function textWithoutIcons(?DOMNode $node): ?string
    {
        if (!$node) {
            return null;
        }
        $clone = $node->cloneNode(true);
        if (!$clone instanceof DOMNode) {
            return $this->text($node);
        }
        foreach ($this->query('.//i', $clone) as $icon) {
            $icon->parentNode?->removeChild($icon);
        }
        return $this->text($clone);
    }

    private function text(?DOMNode $node): ?string
    {
        if (!$node) {
            return null;
        }
        $value = preg_replace('/\s+/u', ' ', trim($node->textContent ?? ''));
        return $value === '' ? null : $value;
    }

    private function hasClass(DOMElement $element, string $class): bool
    {
        return preg_match('/(^|\s)' . preg_quote($class, '/') . '(\s|$)/', $element->getAttribute('class')) === 1;
    }

    private function first(?DOMNode $context, string $expression): ?DOMNode
    {
        if (!$context) {
            return null;
        }
        $nodes = $this->xpath->query($expression, $context);
        return $nodes && $nodes->length > 0 ? $nodes->item(0) : null;
    }

    private function query(string $expression, ?DOMNode $context = null): DOMNodeList
    {
        $nodes = $this->xpath->query($expression, $context);
        if ($nodes === false) {
            throw new RuntimeException("Invalid XPath expression: {$expression}");
        }
        return $nodes;
    }

    private function xpathLiteral(string $value): string
    {
        if (!str_contains($value, "'")) {
            return "'{$value}'";
        }
        if (!str_contains($value, '"')) {
            return '"' . $value . '"';
        }
        $parts = explode("'", $value);
        return 'concat(' . implode(', "\'", ', array_map(static fn ($part) => "'{$part}'", $parts)) . ')';
    }

    private function json(array $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}

function usage(): void
{
    $script = basename(__FILE__);
    echo <<<TXT
Usage:
  php {$script} --file=service-detail.html --slug=growth-infrastructure --name="Growth Infrastructure" [options]

Options:
  --status=draft|published|archived   Default: draft
  --template=service-detail           Default: service-detail
  --replace                           Replace an existing page with the same slug
  --dry-run                           Parse and report counts without inserting records

The database connection is loaded from the application's environment and
dependency container.

TXT;
}

$options = getopt('', [
    'file:',
    'slug:',
    'name:',
    'status::',
    'template::',
    'replace',
    'dry-run',
    'help',
]);

if (isset($options['help'])) {
    usage();
    exit(0);
}

foreach (['file', 'slug', 'name'] as $required) {
    if (!isset($options[$required]) || trim((string) $options[$required]) === '') {
        fwrite(STDERR, "Missing required option --{$required}.\n\n");
        usage();
        exit(1);
    }
}

$file = realpath((string) $options['file']);
if ($file === false || !is_file($file) || !is_readable($file)) {
    fwrite(STDERR, "HTML file not found or unreadable: {$options['file']}\n");
    exit(1);
}

$status = (string) ($options['status'] ?? 'draft');
if (!in_array($status, ['draft', 'published', 'archived'], true)) {
    fwrite(STDERR, "Invalid --status value. Use draft, published, or archived.\n");
    exit(1);
}

$dryRun = isset($options['dry-run']);

try {
    $html = file_get_contents($file);
    if ($html === false) {
        throw new RuntimeException("Unable to read {$file}.");
    }

    $pdo = null;
    if (!$dryRun) {
        $application = Application::getInstance();
        $entityManager = $application->getContainer()->get(EntityManager::class);
        $nativeConnection = $entityManager->getConnection()->getNativeConnection();

        if (!$nativeConnection instanceof PDO) {
            throw new RuntimeException('The application database connection is not PDO-backed.');
        }

        $pdo = $nativeConnection;
    }

    $importer = new ServicePageImporter(
        pdo: $pdo,
        html: $html,
        slug: trim((string) $options['slug']),
        name: trim((string) $options['name']),
        status: $status,
        template: (string) ($options['template'] ?? 'service-detail'),
        replace: isset($options['replace']),
        dryRun: $dryRun,
    );

    $summary = $importer->import();

    echo ($dryRun ? "Dry run complete.\n" : "Import complete.\n");
    echo "Page ID: " . ($summary['page_id'] ?? 'n/a') . "\n";
    echo "Sections: {$summary['sections']}\n";
    echo "Items: {$summary['items']}\n";
    echo "Buttons: {$summary['buttons']}\n";
    echo "Forms: {$summary['forms']}\n";
    echo "Form fields: {$summary['fields']}\n";
    echo "Field options: {$summary['options']}\n";
} catch (Throwable $e) {
    fwrite(STDERR, 'Import failed: ' . $e->getMessage() . "\n");
    exit(1);
}
