<?php

declare(strict_types=1);

namespace App\Core\Contracts;

interface ContactFormInterface
{
    public function validate(array $data): array;

    public function save(array $data): bool;
}
