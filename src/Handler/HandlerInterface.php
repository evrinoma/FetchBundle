<?php

namespace Evrinoma\FetchBundle\Handler;

use Evrinoma\FetchBundle\Description\DescriptionInterface;
use Evrinoma\FetchBundle\Exception\Handler\NotValidException;
use Evrinoma\FetchBundle\Manager\RegisterInterface;

interface HandlerInterface extends RegisterInterface
{
//region SECTION: Public
    /**
     * @return bool
     * @throws NotValidException
     */
    public function isValid(): bool;

    /**
     * @param DescriptionInterface $description
     */
    public function addDescription(DescriptionInterface $description): void;

    /**
     * @param string $name
     */
    public function setDescription(string $name): void;
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @return array
     */
    public function getRaw(): array;
//endregion Getters/Setters
}