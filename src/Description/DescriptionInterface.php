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

namespace Evrinoma\FetchBundle\Description;

use Evrinoma\FetchBundle\Exception\Description\DescriptionCommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionInvalidException;
use Evrinoma\FetchBundle\Manager\RegisterInterface;

interface DescriptionInterface extends RegisterInterface
{
    /**
     * @param $entity
     *
     * @return array
     *
     * @throws DescriptionCommunicationException
     */
    public function load($entity): array;

    /**
     * @return bool
     *
     * @throws DescriptionInvalidException
     */
    public function configure(): bool;
}
