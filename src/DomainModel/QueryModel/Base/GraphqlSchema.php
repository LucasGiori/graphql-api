<?php

namespace App\DomainModel\QueryModel\Base;

use GraphQL\Type\Schema;

class GraphqlSchema
{
    /**
     * @param GraphqlTypeInterface[] $arrayObjectTypes
     */
    public function __construct(
        private array $arrayObjectTypes = []
    ) {}

    /**
     * @return Schema
     */
    public function build()
    {
        $config = [];

        foreach($this->arrayObjectTypes as $objectType) {
            if($objectType instanceof GraphqlQueryAggregator) {
                $config["query"] = $objectType->build();
            }

            if($objectType instanceof GraphqlMutationAggregator) {
                $config["mutation"] = $objectType->build();
            }
        }

        return new Schema(config: $config);
    }
}