<?php

declare(strict_types=1);

namespace SymfonyCertification\Components;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

final class ScComponentsBundle extends AbstractBundle
{
    public function __construct()
    {
        $this->extensionAlias = 'sc_components';
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');
    }
}
