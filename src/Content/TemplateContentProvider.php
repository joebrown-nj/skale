<?php

declare(strict_types=1);

namespace App\Content;

final class TemplateContentProvider
{
    private const TEMPLATE_DIRECTORY = __DIR__ . DIRECTORY_SEPARATOR . 'templates';

    public function get(string $view, $slug): array
    {
        if (!preg_match('/^[a-z0-9-]+$/', $view)) {
            return array();
        }

        $file = self::TEMPLATE_DIRECTORY . DIRECTORY_SEPARATOR . $view . '.php';

        if (!is_file($file)) {
            return array();
        }

        $content = require $file;

        if (!is_array($content)) {
            throw new \UnexpectedValueException(
                sprintf('Template content file "%s" must return an array.', basename($file)),
            );
        }

        return $content;
    }
}
