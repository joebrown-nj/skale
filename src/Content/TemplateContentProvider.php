<?php

declare(strict_types=1);

namespace App\Content;

final class TemplateContentProvider
{
    private const TEMPLATE_DIRECTORY = __DIR__ . '/templates';

    public function get(string $view): array
    {
        if (!preg_match('/^[a-z0-9-]+$/', $view)) {
            return [];
        }

        $file = self::TEMPLATE_DIRECTORY . '/' . $view . '.php';

        if (!is_file($file)) {
            return [];
        }

        $content = require $file;

        if (!is_array($content)) {
            throw new \UnexpectedValueException(
                sprintf('Template content file "%s" must return an array.', basename($file)),
            );
        }

        return $content;
    }
}
