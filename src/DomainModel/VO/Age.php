<?php

namespace App\DomainModel\VO;

use App\DomainModel\VO\Exception\InvalidValue;

class Age extends Vo
{
    private const AGE_MIN = 1;
    private const AGE_MAX = 140;

    /**
     * @param int $age
     * @throws InvalidValue
     */
    public function __construct(private int $age)
    {
        if(!$this->isValid(value: $this->age)) {
            throw InvalidValue::withMessage(message: sprintf("The (%s) value is not valid!", get_class($this)));
        }
    }

    /**
     * @param int $value
     * @return bool
     */
    public function isValid(int $value): bool
    {
        if($value < self::AGE_MIN || $value > self::AGE_MAX) {
            return false;
        }

        return true;
    }
}