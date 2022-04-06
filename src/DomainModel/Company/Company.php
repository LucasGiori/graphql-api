<?php

namespace App\DomainModel\Company;

use App\DomainModel\VO\FantasyName;
use App\DomainModel\VO\ID;

class Company
{
    /**
     * @param ID $id
     * @param FantasyName $fantasyName
     */
    public function __construct(
        private ID $id,
        private FantasyName $fantasyName
    ) {}


    /**
     * @return ID
     */
    public function getId(): ID
    {
        return $this->id;
    }

    /**
     * @return FantasyName
     */
    public function getFantasyName(): FantasyName
    {
        return $this->fantasyName;
    }
}