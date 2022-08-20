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

namespace Evrinoma\FetchBundle\Pull;

use Evrinoma\FetchBundle\Exception\Description\DescriptionCommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionInvalidException;

interface PullInterface
{
    /**
     * @param $entity
     *
     * @return array
     *
     * @throws DescriptionCommunicationException
     * @throws DescriptionInvalidException
     */
    public function pull($entity): array;
}
