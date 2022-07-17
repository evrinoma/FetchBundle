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

namespace Evrinoma\FetchBundle\Run;

use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Exception\Handler\HandlerUnprocessableException;
use Evrinoma\FetchBundle\Handler\HandlerInterface;

interface RunInterface
{
    /**
     * @return HandlerInterface
     *
     * @throws HandlerInvalidException
     * @throws HandlerUnprocessableException
     */
    public function run(): HandlerInterface;
}
