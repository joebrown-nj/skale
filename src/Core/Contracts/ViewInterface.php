<?php

declare(strict_types=1);

namespace App\Core\Contracts;

interface ViewInterface
{
    public function getP1(): ?string;
    public function getP2(): ?string;
    public function getP3(): ?string;
    public function getUri(): ?string;
    public function getUser(): ?array;
    public function render(string $view, array $data = []);
}
