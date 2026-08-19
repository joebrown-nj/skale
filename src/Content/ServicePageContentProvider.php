<?php

declare(strict_types=1);

namespace App\Content;

final class ServicePageContentProvider
{
    private const CONTENT_FILES = [
        'automation-and-software' => 'automation-and-software.php',
        'demand-generation' => 'demand-generation.php',
        'growth-infrastructure' => 'growth-infrastructure.php',
        'strategy-and-optimization' => 'strategy-and-optimization.php',
    ];

    public function getBySlug(string $slug): array
    {
        $file = self::CONTENT_FILES[$slug] ?? null;

        if ($file === null) {
            return [];
        }

        $sections = require __DIR__ . DIRECTORY_SEPARATOR . $file;

        if (!is_array($sections)) {
            throw new \UnexpectedValueException(
                sprintf('Solution content file "%s" must return an array.', $file),
            );
        }

        return $sections;
    }
}
