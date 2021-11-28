<?php

namespace Evrinoma\FetchBundle\Manager;

use Evrinoma\FetchBundle\Exception\Fetch\HandlerInvalidException;
use Evrinoma\FetchBundle\Handler\HandlerInterface;

interface FetchManagerInterface
{
//region SECTION: Getters/Setters
    /**
     * @param string $handlerName
     * @param string $descriptionName
     *
     * @return HandlerInterface
     * @throws HandlerInvalidException
     */
    public function getHandler(string $handlerName, string $descriptionName): HandlerInterface;
//endregion Getters/Setters
}