<?php

namespace Evrinoma\FetchBundle\Handler;


use Evrinoma\FetchBundle\Description\DescriptionInterface;
use Evrinoma\FetchBundle\Exception\Description\DescriptionOverriddenException;
use Evrinoma\FetchBundle\Exception\Handler\HandlerInvalidException;
use Evrinoma\FetchBundle\Exception\Handler\HandlerUnprocessableException;
use Evrinoma\FetchBundle\Pull\PullInterface;
use Evrinoma\FetchBundle\Run\RunInterface;

abstract class AbstractHandler implements HandlerInterface, RunInterface
{
//region SECTION: Fields
    protected ?PullInterface $stream      = null;
    protected array          $data        = [];
    private array            $description = [];
//endregion Fields

//region SECTION: Public
    /**
     * @return HandlerInterface
     * @throws HandlerInvalidException
     * @throws HandlerUnprocessableException
     */
    public function run(): HandlerInterface
    {
        try {
            $this->data = $this->stream->pull();
        } catch (\Exception $e) {
            throw new HandlerUnprocessableException($e->getMessage());
        }

        if (!$this->isValid()) {
            throw new HandlerInvalidException();
        }

        return $this;
    }

    public function addDescription(DescriptionInterface $description): void
    {
        $this->description[$description->name()] = $description;
    }

    /**
     * @return string
     */
    public function tag(): string
    {
        return static::class;
    }
//endregion Public

//region SECTION: Getters/Setters
    public function getRaw(): array
    {
        return $this->data;
    }

    /**
     * @param string $name
     *
     * @throws DescriptionOverriddenException
     */
    public function setDescription(string $name): void
    {
        if (array_key_exists($name, $this->description)) {
            $this->stream = $this->description[$name];
        } else {
            throw new DescriptionOverriddenException();
        }
    }
//endregion Getters/Setters
}