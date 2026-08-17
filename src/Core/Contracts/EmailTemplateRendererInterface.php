<?php

declare(strict_types=1);

namespace App\Core\Contracts;

interface EmailTemplateRendererInterface
{
    public function render(string $content = '', string $email = ''): string;
}
