<?php

namespace App\DomainModel\QueryModel\Base;

use GraphQL\Type\Definition\ObjectType;

class GraphqlAggregator
{
    use GraphqlType;

    /**
     * @var array $objectTypeArray
     */
    private array $objectTypeArray = [];

    /**
     * @param string $name
     * @param GraphqlFieldsCollection $fields
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

    public function build(): ObjectType
    {
        $exists = array_key_exists(key: $this->name, array: $this->objectTypeArray);

        if(empty($this->objectTypeArray) || !$exists) {
            $this->objectTypeArray[$this->name] =  new ObjectType([
                "name" => $this->name,
                "fields" => $this->fields->toArray()
            ]);
        }

        return $this->objectTypeArray[$this->name];
    }
}