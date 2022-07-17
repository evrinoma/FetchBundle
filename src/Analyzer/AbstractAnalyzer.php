<?php

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