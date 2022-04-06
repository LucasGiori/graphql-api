<?php

namespace App\DomainModel\QueryModel\Base;

use GraphQL\Type\Definition\ObjectType;

trait GraphqlType
{
    public function addFields(GraphqlField ...$fields)
    {
        foreach (func_get_args() as $field) {
            $this->fields->addField(field: $field);
        }
    }

    public function build(): ObjectType
    {
        return new ObjectType([
            "name" => $this->name,
            "fields" => $this->fields->toArray()
        ]);
    }
}