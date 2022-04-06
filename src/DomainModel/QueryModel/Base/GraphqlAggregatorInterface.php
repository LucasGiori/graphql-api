<?php

namespace App\DomainModel\QueryModel\Base;

interface GraphqlAggregatorInterface
{
    /**
     * @param GraphqlField $field
     * @return void
     */
    public function addField(GraphqlField $field): void;

    /**
     * @return GraphqlField[]
     */
    public function getFields(): array;

    /**
     * @return array
     */
    public function toArray(): array;
}