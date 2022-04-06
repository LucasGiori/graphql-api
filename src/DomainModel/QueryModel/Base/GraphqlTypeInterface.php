<?php

namespace App\DomainModel\QueryModel\Base;

use GraphQL\Type\Definition\ObjectType;

interface GraphqlTypeInterface
{
    /**
     * @return ObjectType
     */
    public function build(): ObjectType;
}