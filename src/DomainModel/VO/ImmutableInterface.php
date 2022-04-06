<?php

namespace App\DomainModel\VO;

interface ImmutableInterface
{
    /**
     * @param string $key
     * @return void
     */
    public function __unset(string $key): void;

    /**
     * @param string $key
     * @return void
     */
    public function __get(string $key): void;

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set(string $key, mixed $value): void;
}