<?php

namespace Evrinoma\FetchBundle\Pull;

use Evrinoma\FetchBundle\Exception\Description\CommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionNotValidException;

interface PullInterface
{
    /**
     * @throws CommunicationException
     * @throws DescriptionNotValidException
     * @return array
     */
    public function pull(): array;
}