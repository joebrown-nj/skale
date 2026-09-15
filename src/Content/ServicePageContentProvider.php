<?php

declare(strict_types=1);

namespace App\Content;

final class ServicePageContentProvider
{
    private const TEMPLATE_DIRECTORY = __DIR__  . DIRECTORY_SEPARATOR . 'templates/service-detail/';

    private const CONTENT_FILES = array(
        'automation-and-software' => 'automation-and-software.php',
        'demand-generation' => 'demand-generation.php',
        'growth-infrastructure' => 'growth-infrastructure.php',
        'strategy-and-optimization' => 'strategy-and-optimization.php',
    );

    public function getBySlug(string $slug): array
    {
        $file = self::CONTENT_FILES[$slug] ?? null;

        if ($file === null) {
            return array();
        }

        $sections = require self::TEMPLATE_DIRECTORY . DIRECTORY_SEPARATOR . $file;

        if (!is_array($sections)) {
            throw new \UnexpectedValueException(
                sprintf('Solution content file "%s" must return an array.', $file),
            );
        }

        return $sections;
    }

    // The former slug-specific convenience methods were unused. Call
    // getBySlug() directly so this list cannot drift from CONTENT_FILES.
}
