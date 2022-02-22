<?php

namespace Evrinoma\FetchBundle\Pull;

use Evrinoma\FetchBundle\Exception\Description\DescriptionCommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionInvalidException;

interface PullInterface
{
    /**
     * @return array
     * @throws DescriptionCommunicationException
     * @throws DescriptionInvalidException
     */
    public function pull(): array;
}