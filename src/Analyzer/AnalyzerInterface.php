<?php

namespace Evrinoma\FetchBundle\Analyzer;

use Evrinoma\FetchBundle\Registry\RegistryInterface;

interface AnalyzerInterface extends RegistryInterface
{
//region SECTION: Public
    public function doAnalyze();
//endregion Public
}