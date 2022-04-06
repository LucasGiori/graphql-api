<?php

namespace App\DomainModel\QueryModel\Base;

use Closure;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class GraphqlField
{
    /**
     * @param string $field
     * @param Type $type
     * @param Closure|null $callable
     */
    public function __construct(
        private string $field,
        private Type $type,
        private GraphqlArgsCollection|null $args = null,
        private Closure|null $callable = null
    ) {}

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @return GraphqlArgsCollection|null
     */
    public function getArgs(): GraphqlArgsCollection|null
    {
        return $this->args;
    }


    /**
     * @return Closure|null
     */
    public function getCallable(): Closure|null
    {
        return $this->callable;
    }
}