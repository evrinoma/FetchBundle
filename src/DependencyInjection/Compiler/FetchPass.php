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

namespace Evrinoma\FetchBundle\DependencyInjection\Compiler;

use Evrinoma\FetchBundle\Manager\FetchManagerInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FetchPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(FetchManagerInterface::class)) {
            return;
        }

        $definition = $container->findDefinition(FetchManagerInterface::class);

        $taggedServices = $container->findTaggedServiceIds('evrinoma.fetch.handler');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('registerHandler', [new Reference($id)]);
        }

        $taggedServices = $container->findTaggedServiceIds('evrinoma.fetch.description');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('registerDescription', [new Reference($id)]);
        }
    }
}
