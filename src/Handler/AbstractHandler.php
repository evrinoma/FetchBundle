<?php

namespace Evrinoma\FetchBundle\Handler;


use Evrinoma\FetchBundle\Description\DescriptionInterface;
use Evrinoma\FetchBundle\Exception\Fetch\DescriptionInvalidException;
use Evrinoma\FetchBundle\Exception\Handler\NotValidException;
use Evrinoma\FetchBundle\Exception\Handler\UnprocessableException;
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
     * @throws NotValidException
     * @throws UnprocessableException
     */
    public function run(): HandlerInterface
    {
        try {
            $this->data = $this->stream->pull();
        } catch (\Exception $e) {
            throw new UnprocessableException($e->getMessage());
        }

        if (!$this->isValid()) {
            throw new NotValidException();
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
     */
    public function setDescription(string $name): void
    {
        if (array_key_exists($name, $this->description)) {
            $this->stream = $this->description[$name];
        } else {
            throw new DescriptionInvalidException;
        }
    }
//endregion Getters/Setters
}