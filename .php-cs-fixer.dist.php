<?php

/*
 * This file is part of the jascha030/template package.
 *
 * (c) Jascha van Aalst <contact@jaschavanaalst.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Jascha030\PhpCsFixer\Config;
use PhpCsFixer\Finder;

require_once __DIR__ . '/vendor-bin/php-cs-fixer/vendor/autoload.php';

/**
 * Cache dir and file location.
 */
$cacheDirectory = __DIR__ . '/.var/cache';
$cacheFile      = "{$cacheDirectory}/.php-cs-fixer.cache";

/**
 * Create a .cache dir if not already present.
 */
if (! file_exists($cacheDirectory) && ! mkdir($cacheDirectory, 0o700, true) && ! is_dir($cacheDirectory)) {
    throw new RuntimeException(sprintf('Directory "%s" was not created', $cacheDirectory));
}

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude([
        '.github',
        '.phive',
        '.var',
        'tests/Fixtures',
        'tools',
        'vendor',
        'vendor-bin',
    ])
    ->notName('.phpstorm.meta.php')
    ->ignoreDotFiles(false);

return (new Config(
    Config::PHP_82,
    <<<'EOF'
        This file is part of the jascha030/template package.

        (c) Jascha van Aalst <contact@jaschavanaalst.nl>

        For the full copyright and license information, please view the LICENSE
        file that was distributed with this source code.
        EOF,
))
    ->setFinder($finder)
    ->setCacheFile($cacheFile);
