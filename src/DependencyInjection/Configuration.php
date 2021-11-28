<?php

namespace Evrinoma\FetchBundle\DependencyInjection;

use Evrinoma\FetchBundle\EvrinomaFetchBundle;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


class Configuration implements ConfigurationInterface
{
//region SECTION: Getters/Setters
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder      = new TreeBuilder(EvrinomaFetchBundle::FETCH_BUNDLE);
        $rootNode         = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
//endregion Getters/Setters
}
