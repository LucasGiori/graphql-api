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
        return new Schema(
            config: ["query" => $this->arrayObjectTypes[0]->build()]
        );
    }
}