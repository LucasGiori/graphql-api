<?php

namespace App\DomainModel\QueryModel\Company;

use App\DomainModel\QueryModel\Base\GraphqlAggregator;
use App\DomainModel\QueryModel\Base\GraphqlField;
use App\DomainModel\QueryModel\Base\GraphqlFieldsCollection;
use App\DomainModel\QueryModel\Base\GraphqlTypeInterface;
use GraphQL\Type\Definition\Type;

final class QueryCompany extends GraphqlAggregator implements GraphqlTypeInterface
{
    public function __construct()
    {
        parent::__construct(name: "company", fields: $this->generateFields());
    }


    /**
     * @return GraphqlFieldsCollection
     */
    private function generateFields(): GraphqlFieldsCollection
    {
        $id = new GraphqlField(field: "id", type: Type::string());
        $fantasyName = new GraphqlField(field: "fantasyName", type: Type::string());

        return new GraphqlFieldsCollection([$id, $fantasyName]);
    }
}