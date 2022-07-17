<?php

namespace Evrinoma\FetchBundle\Manager;

use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Handler\HandlerInterface;

interface FetchManagerInterface
{

    /**
     * @param string $handlerName
     * @param string $descriptionName
     *
     * @return HandlerInterface
     * @throws HandlerInvalidException
     */
    public function getHandler(string $handlerName, string $descriptionName): HandlerInterface;

}