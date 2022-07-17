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

namespace Evrinoma\FetchBundle\Registry;

interface RegistryInterface
{
    public function add($key, $value): RegistryInterface;

    public function rm($key): RegistryInterface;

    public function all();

    public function has($key): bool;

    public function get($key);

    public function set(array $cache): RegistryInterface;
}
