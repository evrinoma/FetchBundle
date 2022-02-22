<?php

namespace Evrinoma\FetchBundle\Description;

use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\FetchBundle\Exception\Description\DescriptionCommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionInvalidException;
use Evrinoma\FetchBundle\Manager\RegisterInterface;

interface DescriptionInterface extends RegisterInterface
{
//region SECTION: Public
    /**
     * @param DtoInterface|null $dto
     *
     * @return array
     * @throws DescriptionCommunicationException
     */
    public function load(?DtoInterface $dto): array;

    /**
     * @return bool
     * @throws DescriptionInvalidException
     */
    public function configure(): bool;
//endregion Public
}