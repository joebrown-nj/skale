<?php

declare(strict_types=1);

namespace App\Core\Traits;

use App\Core\Contracts\ViewInterface;

trait ValidateMethodTrait
{
    abstract protected function getView(): ViewInterface;

    protected function validateMethod(string $method, string $view): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] !== $method) {
            http_response_code(405);
            return $this->getView()->render($view, [
                'errors' => ['Method not allowed'],
            ]);
        }
        return null;
    }
}
