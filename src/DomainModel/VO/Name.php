<?php

namespace App\DomainModel\VO;

use App\DomainModel\VO\Exception\InvalidValue;

class Name extends Vo
{
    private const MIN_SIZE = 1;
    private const MAX_SIZE = 100;

    /**
     * @param string $name
     * @throws InvalidValue
     */
    public function __construct(private string $name)
    {
        if(!$this->isValid(value: $this->name)) {
            throw InvalidValue::withMessage(message: sprintf("The (%s) value is not valid!", get_class($this)));
        }
    }

    /**
     * @param string $value
     * @return bool
     */
    public function isValid(string $value): bool
    {
        $length = strlen(string: $value);

        if($length < self::MIN_SIZE || $length > self::MAX_SIZE) {
            return false;
        }

        return true;
    }
}