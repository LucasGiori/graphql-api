<?php

namespace App\DomainModel\QueryModel\Base;

class GraphqlQueryAggregator extends GraphqlAggregator implements GraphqlTypeInterface, GraphqlAggregatorInterface
{
    public function __construct()
    {
        parent::__construct(name: "Query", fields: new GraphqlFieldsCollection());
    }
}