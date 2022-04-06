<?php

namespace App\DomainModel\VO;

use App\DomainModel\VO\Exception\ImmutabilityException;
use Fig\Http\Message\StatusCodeInterface;

trait Immutability
{
    /**
     * @param string $key
     * @return void
     */
    public function __unset(string $key): void
    {
        ImmutabilityException::withMessage(
            message: "UNSET_IMMUTABLE",
            statusCode:  StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }

    /**
     * @param string $key
     * @return void
     */
    public function __get(string $key): void
    {
        if (!property_exists($this, $key)) {
            ImmutabilityException::withMessage(
                message: "GET_UNDEFINED_OF_IMMUTABLE",
                statusCode:  StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function __set(string $key, mixed $value): void
    {
        ImmutabilityException::withMessage(
            message: "SET_IMMUTABLE_STATE",
            statusCode:  StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}