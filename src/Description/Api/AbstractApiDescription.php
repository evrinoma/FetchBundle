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
    protected string              $host = '';

    public function __construct(string $host = '', string $route = '')
    {
        $this->client = HttpClient::create();
        $this->host = $host;
        $this->route = $route;
    }

    abstract protected function getOptions($entity): array;

    protected function getHeaders(): array
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ];
    }

    /**
     * @param $entity
     *
     * @return array
     *
     * @throws DescriptionCommunicationException
     */
    public function load($entity): array
    {
        try {
            $response = $this->client->request($this->method, $this->getUrl($entity), $this->toOptions($entity));
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

    private function toOptions($entity): array
    {
        switch ($this->method) {
            case Request::METHOD_GET:
                $key = 'query';
                break;
            case Request::METHOD_PUT:
                $key = 'body';
                break;
            case Request::METHOD_POST:
                $key = 'json';
                break;
            default:
                throw new DescriptionCommunicationException();
        }

        return array_merge($this->getHeaders(), [$key => $this->getOptions($entity)]);
    }

    protected function getUrl($entity): string
    {
        return $this->host.$this->route;
    }
}
