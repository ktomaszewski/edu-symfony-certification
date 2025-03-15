<?php

declare(strict_types=1);

use SymfonyCertification\App\ScAppBundle;
use SymfonyCertification\Components\ScComponentsBundle;
use SymfonyCertification\Shared\ScSharedBundle;

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    ScSharedBundle::class => ['all' => true],
    ScAppBundle::class => ['all' => true],
    ScComponentsBundle::class => ['all' => true],
];
