<?php

namespace App\DomainModel\VO;

use App\DomainModel\VO\Exception\InvalidValue;
use Ramsey\Uuid\Uuid;

class ID extends Vo
{
    /**
     * @param string $uuid
     * @throws InvalidValue
     */
    public function __construct(private string $uuid)
    {
        if(!Uuid::isValid(uuid: $this->uuid)) {
            throw InvalidValue::withMessage(message: sprintf("The (%s) value is not valid!", get_class($this)));
        }
    }
}