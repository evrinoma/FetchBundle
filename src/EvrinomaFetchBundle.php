<?php

namespace Evrinoma\FetchBundle;

use Evrinoma\FetchBundle\DependencyInjection\EvrinomaFetchExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EvrinomaFetchBundle extends Bundle
{
//region SECTION: Fields
    public const FETCH_BUNDLE = 'fetch';

//endregion Fields
//region SECTION: Public
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        ;
    }
//endregion Public

//region SECTION: Getters/Setters
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaFetchExtension();
        }

        return $this->extension;
    }
//endregion Getters/Setters


}