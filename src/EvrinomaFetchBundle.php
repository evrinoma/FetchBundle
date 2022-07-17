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
