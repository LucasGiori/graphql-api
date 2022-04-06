<?php

namespace App\DomainModel\QueryModel\Base;

class GraphqlArgsCollection
{
    /**
     * @param GraphqlArg[] $args
     */
    public function __construct(private array $args = []){}

    /**
     * @param GraphqlArg $arg
     * @return void
     */
    public function addField(GraphqlArg $arg): void
    {
        $this->args[] = $arg;
    }

    /**
     * @return GraphqlArg[]
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $args = [];

        foreach ($this->getArgs() as $graphqlArg) {
            $args[$graphqlArg->getName()] = $graphqlArg->getType();
        }

        return $args;
    }
}