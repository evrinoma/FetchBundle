<?php

namespace Evrinoma\FetchBundle\Registry;

interface RegistryInterface
{

    public function add($key, $value): RegistryInterface;

    public function rm($key): RegistryInterface;

    public function all();

    public function has($key):bool;



    public function get($key);

    public function set(array $cache): RegistryInterface;

}