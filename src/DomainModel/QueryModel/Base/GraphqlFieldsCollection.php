<?php

namespace App\DomainModel\QueryModel\Base;

class GraphqlFieldsCollection
{
    /**
     * @param GraphqlField[] $fields
     */
    public function __construct(private array $fields = []){}

    /**
     * @param GraphqlField $field
     * @return void
     */
    public function addField(GraphqlField $field): void
    {
        $this->fields[] = $field;
    }

    /**
     * @return GraphqlField[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $fields = [];

        foreach ($this->getFields() as $graphqlField) {
            $config = ["type" => $graphqlField->getType()];

            if(!is_null($graphqlField->getArgs())) {
                $config["args"] = $graphqlField->getArgs()->toArray();
            }

            if(!is_null($graphqlField->getCallable())) {
                $config["resolve"] = $graphqlField->getCallable();
            }

            $fields[$graphqlField->getField()] = $config;
        }

        return $fields;
    }
}