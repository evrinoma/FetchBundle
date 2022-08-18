<?php

declare(strict_types=1);

/*
 * This file is part of the package.
 *
 * (c) Nikolay Nikolaev <evrinoma@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Evrinoma\FetchBundle\Handler;

use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\FetchBundle\Description\DescriptionInterface;
use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Manager\RegisterInterface;

interface HandlerInterface extends RegisterInterface
{
    /**
     * @return bool
     *
     * @throws HandlerInvalidException
     */
    public function isValid(): bool;

    /**
     * @param DescriptionInterface $description
     */
    public function addDescription(DescriptionInterface $description): void;

    /**
     * @param $entity
     *
     * @return HandlerInterface
     */
    public function setEntity($entity): HandlerInterface;

    /**
     * @param string $name
     */
    public function setDescription(string $name): void;

    /**
     * @return array
     */
    public function getRaw(): array;
}
