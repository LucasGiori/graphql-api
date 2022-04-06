<?php

namespace App\DomainModel\QueryModel\Company;

use App\DomainModel\QueryModel\Base\GraphqlAggregator;
use App\DomainModel\QueryModel\Base\GraphqlField;
use App\DomainModel\QueryModel\Base\GraphqlFieldsCollection;
use App\DomainModel\QueryModel\Base\GraphqlTypeInterface;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

final class Company extends GraphqlAggregator implements GraphqlTypeInterface
{
    private static Company $instance;

    private function __construct()
    {
        parent::__construct(name: "company", fields: $this->generateFields());
    }

    private function __clone() {}

    public function __wakeup() {}

    public static function getInstance(): self
    {
        if(empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
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