<?php

namespace Evrinoma\FetchBundle\DependencyInjection\Compiler;

use Evrinoma\FetchBundle\Manager\FetchManager;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FetchPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(FetchManager::class)) {
            return;
        }

        $definition = $container->findDefinition(FetchManager::class);

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