<?php

namespace Evrinoma\FetchBundle\DependencyInjection;

use Evrinoma\FetchBundle\EvrinomaFetchBundle;
use Evrinoma\UtilsBundle\DependencyInjection\HelperTrait;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class EvrinomaFetchExtension extends Extension
{
    use HelperTrait;


    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }



    public function getAlias()
    {
        return EvrinomaFetchBundle::BUNDLE;
    }

}