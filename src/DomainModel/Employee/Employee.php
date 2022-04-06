<?php

namespace App\DomainModel\Employee;

use App\DomainModel\Company\Company;
use App\DomainModel\Person\Person;
use App\DomainModel\VO\ID;
use App\DomainModel\VO\Occupation;
use App\DomainModel\VO\Remuneration;

class Employee
{
    public function __construct(
        private ID $id,
        private Remuneration $remuneration,
        private Occupation $occupation,
        private Person $person,
        private Company $company
    ) {}

    /**
     * @return ID
     */
    public function getId(): ID
    {
        return $this->id;
    }

    /**
     * @return Remuneration
     */
    public function getRemuneration(): Remuneration
    {
        return $this->remuneration;
    }

    /**
     * @return Occupation
     */
    public function getOccupation(): Occupation
    {
        return $this->occupation;
    }

    /**
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $newCompany
     * @return void
     */
    public function changeCompany(Company $newCompany): void
    {
        $this->company = $newCompany;
    }
}