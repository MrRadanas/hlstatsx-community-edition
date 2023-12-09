<?php

declare(strict_types=1);

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var');

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        '@DoctrineAnnotation' => true,
        '@PHP82Migration' => true,
        'phpdoc_summary'         => false,
    ])
    ->setFinder($finder);
