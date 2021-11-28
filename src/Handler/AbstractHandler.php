<?php

namespace Evrinoma\FetchBundle\Handler;


use Evrinoma\FetchBundle\Exception\Handler\NotValidException;
use Evrinoma\FetchBundle\Exception\Handler\UnprocessableException;
use Evrinoma\FetchBundle\Pull\PullInterface;
use Evrinoma\FetchBundle\Run\RunInterface;

abstract class AbstractHandler implements HandlerInterface, RunInterface
{
//region SECTION: Fields
    protected PullInterface $stream;
    protected array         $data = [];
//endregion Fields
//endregion Fields

//region SECTION: Constructor
    public function __construct(PullInterface $stream)
    {
        $this->stream   = $stream;
    }
//endregion Constructor

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

//endregion Public
//region SECTION: Getters/Setters
    public function getRaw(): array
    {
        return $this->data;
    }
//endregion Getters/Setters
}