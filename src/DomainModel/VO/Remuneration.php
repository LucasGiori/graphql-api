<?php

namespace App\DomainModel\VO;

use App\DomainModel\VO\Exception\InvalidValue;

class Remuneration extends Vo
{
    private const MIN = 1;

    /**
     * @param float $remuneration
     * @throws InvalidValue
     */
    public function __construct(private float $remuneration)
    {
        if(!$this->isValid(value: $this->remuneration)) {
            throw InvalidValue::withMessage(message: sprintf("The (%s) value is not valid!", get_class($this)));
        }
    }

    /**
     * @param float $value
     * @return bool
     */
    public function isValid(float $value): bool
    {
        if($value < self::MIN) {
            return false;
        }

        return true;
    }
}