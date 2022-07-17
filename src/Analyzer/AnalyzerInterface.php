<?php

namespace Evrinoma\FetchBundle\Analyzer;

use Evrinoma\FetchBundle\Registry\RegistryInterface;

interface AnalyzerInterface extends RegistryInterface
{

    public function doAnalyze();

}