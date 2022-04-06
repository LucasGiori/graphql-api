<?php

namespace App\Repository\Company;

use Ramsey\Uuid\Uuid;

class CompanyRepository
{
    /**
     * @return array
     */
    public function first(): array
    {
        return [
            ["id" => Uuid::uuid4(), "fantasyName" => "Boa Compra by PagSeguro"],
            ["id" => Uuid::uuid4(), "fantasyName" => "Gazin Tech"],
            ["id" => Uuid::uuid4(), "fantasyName" => "Fiscontech"]
        ];
    }

    /**
     * @param string $fantasyName
     * @return array[]
     */
    public function add( string $fantasyName): array
    {
        return [
            ["id" => Uuid::uuid4(), "fantasyName" => $fantasyName],
        ];
    }
}