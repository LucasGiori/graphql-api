<?php

namespace App\DomainModel\QueryModel\Base;

use GraphQL\Type\Definition\Type;

class GraphqlArg
{
    /**
     * @param string $name
     * @param Type $type
     */
    public function __construct(
        private string $name,
        private Type $type
    ) {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }
}