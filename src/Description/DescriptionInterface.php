<?php

namespace Evrinoma\FetchBundle\Description;

use Evrinoma\FetchBundle\Exception\Description\CommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionNotValidException;

interface DescriptionInterface
{
//region SECTION: Public
    /**
     * @throws CommunicationException
     * @return array
     */
    public function load():array;

    /**
     * @throws DescriptionNotValidException
     * @return bool
     */
    public function configure(): bool;
//endregion Public
}