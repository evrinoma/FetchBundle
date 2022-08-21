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

use Evrinoma\FetchBundle\Description\DescriptionInterface;
use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Handler\HandlerInterface;

class FetchManager implements FetchManagerInterface
{
    private array $handler = [];
    private array $name = [];

    public function registerHandler(HandlerInterface $handler)
    {
        $tag = $handler->tag();
        $this->handler[$tag] = $handler;
        $this->name[$handler->name()] = &$this->handler[$tag];
    }

    public function registerDescription(DescriptionInterface $description)
    {
        $handler = $this->handler[$description->tag()];
        /* @var HandlerInterface $handler */
        $handler->addDescription($description);
    }

    /**
     * @param string $handlerName
     * @param string $descriptionName
     *
     * @return HandlerInterface
     *
     * @throws HandlerInvalidException
     */
    public function getHandler(string $handlerName, string $descriptionName): HandlerInterface
    {
        if (\array_key_exists($handlerName, $this->name)) {
            $handler = $this->name[$handlerName];
            $handler->setDescription($descriptionName);
        } else {
            throw new HandlerInvalidException();
        }

        return $handler;
    }

    public function getManagerName(): string
    {
        return FetchManagerInterface::class;
    }
}
