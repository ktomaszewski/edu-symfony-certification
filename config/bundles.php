<?php

declare(strict_types=1);

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['all' => true],
    SymfonyCertification\Shared\ScSharedBundle::class => ['all' => true],
    SymfonyCertification\App\ScAppBundle::class => ['all' => true],
    SymfonyCertification\Components\ScComponentsBundle::class => ['all' => true],
];
