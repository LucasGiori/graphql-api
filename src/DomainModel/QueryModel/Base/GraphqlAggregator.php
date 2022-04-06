<?php

namespace App\DomainModel\QueryModel\Base;

class GraphqlAggregator
{
    use GraphqlType;

    /**
     * @param string $name
     * @param GraphqlFieldsCollection|null $fields
     */
    public function __construct(
        protected string $name,
        protected GraphqlFieldsCollection $fields
    ){}

    /**
     * @param GraphqlField $field
     * @return void
     */
    public function addField(GraphqlField $field): void
    {
        $this->fields->addField(field: $field);
    }

    /**
     * @return GraphqlField[]
     */
    public function getFields(): array
    {
        return $this->fields->getFields();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $fields = [];

        foreach ($this->getFields() as $graphqlField) {
            $config = ["type" => $graphqlField->getType()];

            if(!is_null($graphqlField->getCallable())) {
                $config["resolve"] = $graphqlField->getCallable();
            }

            $fields[$graphqlField->getField()] = $config;
        }

        return $fields;
    }
}