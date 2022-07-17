<?php

namespace Evrinoma\FetchBundle;

use Evrinoma\FetchBundle\DependencyInjection\Compiler\FetchPass;
use Evrinoma\FetchBundle\DependencyInjection\EvrinomaFetchExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EvrinomaFetchBundle extends Bundle
{

    public const BUNDLE = 'fetch';



    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new FetchPass());
    }



    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaFetchExtension();
        }

        return $this->extension;
    }



}