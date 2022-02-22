<?php

namespace Evrinoma\FetchBundle\Manager;

use Evrinoma\FetchBundle\Description\DescriptionInterface;
use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Handler\HandlerInterface;

class FetchManager implements FetchManagerInterface
{
//region SECTION: Fields
    private array $handler = [];
    private array $name = [];
//endregion Fields

//region SECTION: Public
    public function registerHandler(HandlerInterface $handler)
    {
        $tag = $handler->tag();
        $this->handler[$tag] = $handler;
        $this->name[$handler->name()] = &$this->handler[$tag] ;
    }

    public function registerDescription(DescriptionInterface $description)
    {
        $handler = $this->handler[$description->tag()];
        /** @var HandlerInterface $handler */
        $handler->addDescription($description);
    }
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @param string $handlerName
     * @param string $descriptionName
     *
     * @return HandlerInterface
     * @throws HandlerInvalidException
     */
    public function getHandler(string $handlerName, string $descriptionName): HandlerInterface
    {
        if (array_key_exists($handlerName, $this->name)) {
            $handler = $this->name[$handlerName];
            $handler->setDescription($descriptionName);
        } else {
            throw new HandlerInvalidException;
        }

        return $handler;
    }

//endregion Getters/Setters

}