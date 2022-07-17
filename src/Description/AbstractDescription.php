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
use Evrinoma\FetchBundle\Pull\PullInterface;

abstract class AbstractDescription implements DescriptionInterface, PullInterface
{
    /**
     * @return array
     *
     * @throws DescriptionCommunicationException
     * @throws DescriptionInvalidException
     */
    public function pull(): array
    {
        try {
            $dto = null;
            $data = $this->configure() ? $this->load($dto) : [];
        } catch (\Exception $e) {
            throw $e;
        }

        return $data;
    }
}
