final <?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Contracts\ContactFormInterface;
use App\Core\Services\FormSubmissionService;
use App\Models\Entities\ContactEntity;
use Doctrine\ORM\EntityManager;
use Throwable;

class ContactModel implements ContactFormInterface
{
    private EntityManager $entityManager;

    #[\Override]
    public function validate(array $data): array
    {
        if (FormSubmissionService::containsMaliciousInput($data)) {
            return ['Invalid or unsafe content detected'];
        }

        $errors = [];
        $formType = trim((string) ($data['form_type'] ?? 'contact'));

        if ($formType !== 'newsletter' && trim((string) ($data['name'] ?? '')) === '') {
            $errors[] = 'Name is required';
        }

        if (!filter_var(trim((string) ($data['email'] ?? '')), FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email is required';
        }

        if ($formType === 'contact' && trim((string) ($data['phone'] ?? '')) === '') {
            $errors[] = 'Phone is required';
        }

        if ($formType === 'contact' && trim((string) ($data['comment'] ?? '')) === '') {
            $errors[] = 'Comment is required';
        }

        if (strlen(trim((string) ($data['name'] ?? ''))) > 50) {
            $errors[] = 'Name must be 50 characters or fewer';
        }

        if (strlen(trim((string) ($data['email'] ?? ''))) > 100) {
            $errors[] = 'Email must be 100 characters or fewer';
        }

        if (strlen(trim((string) ($data['phone'] ?? ''))) > 20) {
            $errors[] = 'Phone must be 20 characters or fewer';
        }

        return $errors;
    }

    #[\Override]
    public function save(array $data): bool
    {
        if (FormSubmissionService::containsMaliciousInput($data)) {
            return false;
        }

        try {
            $contact = $this->buildContactEntity($data);
            $this->entityManager->persist($contact);
            $this->entityManager->flush();
            return true;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    private function buildContactEntity(array $data): ContactEntity
    {
        $contact = new ContactEntity();
        $formType = trim((string) ($data['form_type'] ?? 'contact'));
        $interests = $data['interests'] ?? ($data['interest'] ?? []);

        if (!is_array($interests)) {
            $interests = [$interests];
        }

        $contact->setName(trim((string) ($data['name'] ?? 'Newsletter Subscriber')));
        $contact->setEmail(trim((string) $data['email']));
        $contact->setPhone(trim((string) ($data['phone'] ?? '')));
        $contact->setMessage($this->buildMessage($data, $formType));
        $contact->setInterestedIn(substr((string) json_encode(array_values(array_filter($interests))), 0, 100));

        return $contact;
    }

    private function buildMessage(array $data, string $formType): string
    {
        $message = trim((string) ($data['comment'] ?? ($data['message'] ?? '')));
        $context = [];

        foreach (['company', 'team_size', 'goal'] as $field) {
            if (trim((string) ($data[$field] ?? '')) !== '') {
                $context[] = ucwords(str_replace('_', ' ', $field)) . ': ' . trim((string) $data[$field]);
            }
        }

        return trim(
            ucwords(str_replace(['-', '_'], ' ', $formType)) . " form submission\n"
            . implode("\n", $context)
            . ($message !== '' ? "\n" . $message : ''),
        );
    }

    public function processContactForm(array $data): bool
    {
        return $this->save($data);
    }

    public function checkLeadForm(array $data): array
    {
        return $this->validate($data);
    }

    public function processLeadForm(array $data): bool
    {
        return $this->save($data);
    }
}
