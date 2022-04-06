<?php

namespace App\DomainModel\Person;

use App\DomainModel\VO\Age;
use App\DomainModel\VO\ID;
use App\DomainModel\VO\Name;

class Person
{
    /**
     * @param ID $id
     * @param Name $name
     * @param Age $age
     */
    public function __construct(
        private ID $id,
        private Name $name,
        private Age $age
    ) {}

    /**
     * @return ID
     */
    public function getId(): ID
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Age
     */
    public function getAge(): Age
    {
        return $this->age;
    }
}

