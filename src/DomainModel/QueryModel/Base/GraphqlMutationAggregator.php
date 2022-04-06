<?php

namespace App\DomainModel\QueryModel\Base;

use GraphQL\Type\Definition\ObjectType;

class GraphqlMutationAggregator  extends  GraphqlAggregator implements GraphqlTypeInterface, GraphqlAggregatorInterface
{
    public function __construct()
    {
        parent::__construct(name: "Mutation", fields: new GraphqlFieldsCollection());
    }
}