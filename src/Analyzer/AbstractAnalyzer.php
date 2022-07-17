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

namespace Evrinoma\FetchBundle\Analyzer;

use Evrinoma\FetchBundle\Registry\RegistryTrait;

abstract class AbstractAnalyzer implements AnalyzerInterface
{
    use RegistryTrait;

    protected array        $error = [];

    protected function addError(string $error): AbstractAnalyzer
    {
        $this->error[] = $error;

        return $this;
    }
}
