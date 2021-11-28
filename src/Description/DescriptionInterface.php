<?php

namespace Evrinoma\FetchBundle\Description;

use Evrinoma\FetchBundle\Exception\Description\CommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionNotValidException;
use Evrinoma\FetchBundle\Manager\RegisterInterface;

interface DescriptionInterface extends RegisterInterface
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