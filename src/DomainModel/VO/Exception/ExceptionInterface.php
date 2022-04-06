<?php

namespace App\DomainModel\VO\Exception;

interface ExceptionInterface
{
    /**
     * @param string $message
     * @param int $statusCode
     * @return mixed
     */
    public static function withMessage(string $message, int $statusCode): mixed;
}