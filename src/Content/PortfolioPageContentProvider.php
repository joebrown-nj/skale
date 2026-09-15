<?php

declare(strict_types=1);

namespace App\Content;

final class PortfolioPageContentProvider
{
    private const TEMPLATE_DIRECTORY = __DIR__  . DIRECTORY_SEPARATOR . 'templates/portfolio/';

    public function getBySlug(string $slug): array
    {
        $file = $slug . '.php';

        if (!file_exists(self::TEMPLATE_DIRECTORY . DIRECTORY_SEPARATOR . $file)) {
            return array();
        }

        $contentArray = require self::TEMPLATE_DIRECTORY . DIRECTORY_SEPARATOR . $file;

        if (!is_array($contentArray)) {
            throw new \UnexpectedValueException(
                sprintf('Portfolio content file "%s" must return an array.', $file),
            );
        }

        return $contentArray;
    }
}
