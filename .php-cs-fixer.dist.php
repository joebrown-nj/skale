<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

return (new Config())
    ->setRiskyAllowed(true)
    ->setRules(array(
        '@auto' => true,
        '@auto:risky' => true,
        'array_syntax' => array('syntax' => 'long'),
    ))
    // 💡 by default, Fixer looks for `*.php` files excluding `./vendor/` - here, you can groom this config
    ->setFinder(
        (new Finder())
            // 💡 root folder to check
            ->in(__DIR__)
            // 💡 additional files, eg bin entry file
            // ->append(array(__DIR__.'/bin-entry-file'))
            // 💡 folders to exclude, if any
            ->exclude(array('src/Views/templates_c'))
            // 💡 path patterns to exclude, if any
            // ->notPath(array(/* ... */))
            // 💡 extra configs
            // ->ignoreDotFiles(false) // true by default in v3, false in v4 or future mode
            // ->ignoreVCS(true) // true by default
    )
;
