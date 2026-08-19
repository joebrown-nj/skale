<?php

declare(strict_types=1);

namespace App\Core\Contracts;

interface ViewInterface
{




    public function getUser(): ?array;
    public function render(string $view, array $data = []);
}
