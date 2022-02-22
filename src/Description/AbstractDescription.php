<?php

namespace Evrinoma\FetchBundle\Description;

use Evrinoma\FetchBundle\Exception\Description\DescriptionCommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionInvalidException;
use Evrinoma\FetchBundle\Pull\PullInterface;

abstract class AbstractDescription implements DescriptionInterface, PullInterface
{
//region SECTION: Public
    /**
     * @return array
     * @throws DescriptionCommunicationException
     * @throws DescriptionInvalidException
     */
    public function pull(): array
    {
        try {
            $dto  = null;
            $data = $this->configure() ? $this->load($dto) : [];
        } catch (\Exception $e) {
            throw $e;
        }

        return $data;
    }
//endregion Public
}