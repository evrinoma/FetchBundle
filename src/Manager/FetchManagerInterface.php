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

namespace Evrinoma\FetchBundle\Manager;

use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Handler\HandlerInterface;
use Evrinoma\UtilsBundle\Manager\EntityManagerInterface;

interface FetchManagerInterface extends EntityManagerInterface
{
    /**
     * @param string $handlerName
     * @param string $descriptionName
     *
     * @return HandlerInterface
     *
     * @throws HandlerInvalidException
     */
    public function getHandler(string $handlerName, string $descriptionName): HandlerInterface;
}
