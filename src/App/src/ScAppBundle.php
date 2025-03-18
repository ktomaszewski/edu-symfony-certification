<?php

declare(strict_types=1);

namespace SymfonyCertification\App;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

final class ScAppBundle extends AbstractBundle
{
    public function __construct()
    {
        $this->extensionAlias = 'sc_app';
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/controllers.yaml');
    }
}
