<?php

namespace Evrinoma\FetchBundle\DependencyInjection;

use Evrinoma\FetchBundle\EvrinomaFetchBundle;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder      = new TreeBuilder(EvrinomaFetchBundle::BUNDLE);
        $rootNode         = $treeBuilder->getRootNode();

        return $treeBuilder;
    }

}
