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

namespace Evrinoma\FetchBundle\Description\Api;

use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\FetchBundle\Description\AbstractDescription;
use Evrinoma\FetchBundle\Exception\Description\DescriptionCommunicationException;
use Evrinoma\FetchBundle\Exception\Description\DescriptionInvalidException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractApiDescription extends AbstractDescription
{
    protected HttpClientInterface $client;
    protected string              $method = '';
    protected string              $route = '';
    private string                $apiHost = '';

    public function __construct(string $apiHost)
    {
        $this->client = HttpClient::create();
        $this->apiHost = $apiHost;
    }

    abstract protected function getOptions(?DtoInterface $dto): array;

    protected function getHeaders(): array
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ];
    }

    /**
     * @param DtoInterface|null $dto
     *
     * @return array
     *
     * @throws DescriptionCommunicationException
     */
    public function load(?DtoInterface $dto): array
    {
        try {
            $response = $this->client->request($this->method, $this->getUrl(), $this->toOptions($dto));
        } catch (\Throwable $e) {
            throw new DescriptionCommunicationException($e->getMessage());
        }

        return json_decode($response->getContent(), true);
    }

    /**
     * @return bool
     *
     * @throws DescriptionInvalidException
     */
    public function configure(): bool
    {
        return true;
    }

    private function toOptions(?DtoInterface $dto): array
    {
        switch ($this->method) {
            case Request::METHOD_GET:
                $key = 'query';
                break;
            case Request::METHOD_POST:
                $key = 'body';
                break;
            case Request::METHOD_PUT:
                $key = 'json';
                break;
            default:
                throw new DescriptionCommunicationException();
        }

        return array_merge($this->getHeaders(), [$key => $this->getOptions($dto)]);
    }

    private function getUrl(): string
    {
        return $this->apiHost.$this->route;
    }
}
