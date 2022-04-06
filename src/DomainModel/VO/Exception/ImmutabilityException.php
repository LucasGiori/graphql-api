<?php

namespace App\DomainModel\VO\Exception;

use LogicException;
use Throwable;

class ImmutabilityException extends LogicException implements ExceptionInterface
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        parent::__construct(message: $message, code: $code, previous:  $previous);
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @return mixed
     */
    public static function withMessage(string $message, int $statusCode): mixed
    {
        return new static(message: $message, code: $statusCode);
    }
}