<?php

namespace Evrinoma\FetchBundle\Handler;

use Evrinoma\FetchBundle\Exception\Handler\NotValidException;

interface HandlerInterface
{
//region SECTION: Public
    /**
     * @throws NotValidException
     * @return bool
     */
    public function isValid(): bool;
//endregion Public

//region SECTION: Getters/Setters
    public function getRaw(): array;
//endregion Getters/Setters
}