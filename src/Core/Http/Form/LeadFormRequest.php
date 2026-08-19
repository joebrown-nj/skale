<?php

declare(strict_types=1);

namespace App\Core\Http\Form;

use App\Core\Http\Request;

final class LeadFormRequest
{
    /** @var array<string, mixed> */
    private readonly array $data;

    public function __construct(private readonly Request $request)
    {
        $input = $request->post();
        $this->data = [
            'form_type' => 'landing-page',
            'name' => $this->text($input['name'] ?? '', 50),
            'email' => strtolower($this->text($input['email'] ?? '', 100)),
            'phone' => $this->text($input['phone'] ?? '', 20),
            'team_size' => $this->text($input['team_size'] ?? '', 50),
            'comment' => $this->text($input['comment'] ?? '', 2000),
        ];
    }

    /** @return array<string, mixed> */
    public function validated(): array
    {
        return $this->data;
    }
    public function server(): array
    {
        return $this->request->server();
    }
    public function clientIp(): string
    {
        return $this->request->clientIp();
    }

    /** @return list<string> */
    public function errors(): array
    {
        $errors = [];
        if ($this->data['name'] === '') {
            $errors[] = 'Name is required';
        }
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email is required';
        }
        if (!$this->csrfIsValid()) {
            $errors[] = 'The form has expired. Please refresh and try again.';
        }
        return $errors;
    }

    private function csrfIsValid(): bool
    {
        $expected = $_SESSION['csrf_token'] ?? null;
        if (!is_string($expected) || $expected === '') {
            return true;
        }
        $provided = $this->request->post()['_csrf_token'] ?? '';
        return is_string($provided) && hash_equals($expected, $provided);
    }

    private function text(mixed $value, int $max): string
    {
        if (is_array($value) || is_object($value)) {
            return '';
        }
        $value = trim(preg_replace('/\s+/u', ' ', (string) $value) ?? '');
        return function_exists('mb_substr') ? mb_substr($value, 0, $max) : substr($value, 0, $max);
    }
}
