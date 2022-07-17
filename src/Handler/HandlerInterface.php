<?php

namespace Evrinoma\FetchBundle\Handler;

use Evrinoma\FetchBundle\Description\DescriptionInterface;
use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Manager\RegisterInterface;

interface HandlerInterface extends RegisterInterface
{

    /**
     * @return bool
     * @throws HandlerInvalidException
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



    /**
     * @return array
     */
    public function getRaw(): array;

}