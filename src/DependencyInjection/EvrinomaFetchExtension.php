<?php

declare(strict_types=1);

/*
 * This file is part of the package.
 *
 * (c) Nikolay Nikolaev <evrinoma@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Evrinoma\FetchBundle\DependencyInjection;

use Evrinoma\FetchBundle\EvrinomaFetchBundle;
use Evrinoma\FetchBundle\Manager\FetchManager;
use Evrinoma\FetchBundle\Manager\FetchManagerInterface;
use Evrinoma\UtilsBundle\DependencyInjection\HelperTrait;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class EvrinomaFetchExtension extends Extension
{
    use HelperTrait;

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $fetchManager = new Definition(FetchManager::class);
        $fetchManager->setPublic(true);
        $alias = new Alias('evrinoma.fetch.manager.fetch');
        $alias->setPublic(true);
        $container->addDefinitions(['evrinoma.fetch.manager.fetch' => $fetchManager]);
        $container->addAliases([FetchManagerInterface::class => $alias]);
    }

    public function getAlias()
    {
        return EvrinomaFetchBundle::BUNDLE;
    }
}
