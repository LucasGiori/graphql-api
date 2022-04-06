<?php

namespace App\DomainModel\QueryModel\Company;

use App\DomainModel\QueryModel\Base\GraphqlAggregatorInterface;
use App\DomainModel\QueryModel\Base\GraphqlField;
use App\Repository\Company\CompanyRepository;
use GraphQL\Type\Definition\Type;

class RootFacade
{
    /**
     * @param GraphqlAggregatorInterface $graphqlAggregator
     */
    private function __construct(
        private GraphqlAggregatorInterface $graphqlAggregator
    ) {
        $fieldsQuery = $this->getFieldsQuery();
        $this->graphqlAggregator->addFields(...$fieldsQuery);
    }

    /**
     * @param GraphqlAggregatorInterface $graphqlQueryAggregator
     * @return static
     */
    public static function configure(GraphqlAggregatorInterface $graphqlQueryAggregator): static
    {
        return new static(graphqlAggregator: $graphqlQueryAggregator);
    }

    /**
     * @return GraphqlField[]
     */
    private function getFieldsQuery(): array
    {
        $queryCompany = new QueryCompany();

        $companies = new GraphqlField(
            field: "companies",
            type: Type::listOf(wrappedType: $queryCompany->build()),
            callable: function ($root, $args) {
                return (new CompanyRepository())->first();
            }
        );

        return [$companies];
    }
}