<?php

namespace Evrinoma\FetchBundle\Run;

use Evrinoma\FetchBundle\Exception\Handler\UnprocessableException;
use Evrinoma\FetchBundle\Exception\Handler\NotValidException;
use Evrinoma\FetchBundle\Handler\HandlerInterface;

interface RunInterface
{
    /**
     * @return HandlerInterface
     * @throws NotValidException
     * @throws UnprocessableException
     */
    public function run(): HandlerInterface;
}