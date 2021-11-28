<?php

namespace Evrinoma\FetchBundle\Description;

use Evrinoma\FetchBundle\Exception\Description\CommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionNotValidException;
use Evrinoma\FetchBundle\Pull\PullInterface;

abstract class AbstractDescription implements DescriptionInterface, PullInterface
{
//region SECTION: Public
    /**
     * @return array
     * @throws CommunicationException
     * @throws DescriptionNotValidException
     */
    public function pull(): array
    {
        try {
            $data = $this->configure() ? $this->load() : [];
        } catch (\Exception $e) {
            throw $e;
        }

        return $data;
    }
//endregion Public
}