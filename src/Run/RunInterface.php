<?php

namespace Evrinoma\FetchBundle\Run;

use Evrinoma\FetchBundle\Exception\Handler\HandlerUnprocessableException;
use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Handler\HandlerInterface;

interface RunInterface
{
    /**
     * @return HandlerInterface
     * @throws HandlerInvalidException
     * @throws HandlerUnprocessableException
     */
    public function run(): HandlerInterface;
}