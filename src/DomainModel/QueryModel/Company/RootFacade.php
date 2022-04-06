<?php

namespace App\DomainModel\QueryModel\Company;

use App\DomainModel\QueryModel\Base\GraphqlAggregatorInterface;
use App\DomainModel\QueryModel\Base\GraphqlArg;
use App\DomainModel\QueryModel\Base\GraphqlArgsCollection;
use App\DomainModel\QueryModel\Base\GraphqlField;
use App\DomainModel\QueryModel\Base\GraphqlMutationAggregator;
use App\DomainModel\QueryModel\Base\GraphqlQueryAggregator;
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
        if ($this->graphqlAggregator instanceof GraphqlQueryAggregator) {
            $fieldsQuery = $this->getFieldsQuery();
            $this->graphqlAggregator->addFields(...$fieldsQuery);
        }

        if ($this->graphqlAggregator instanceof GraphqlMutationAggregator) {
            $fieldsMutation = $this->getFieldsMutation();
            $this->graphqlAggregator->addFields(...$fieldsMutation);
        }
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
        $queryCompany = Company::getInstance();

        $companies = new GraphqlField(
            field: "companies",
            type: Type::listOf(wrappedType: $queryCompany->build()),
            callable: function ($root, $args) {
                return (new CompanyRepository())->first();
            }
        );

        return [$companies];
    }

    /**
     * @return GraphqlField[]
     */
    private function getFieldsMutation(): array
    {
        $mutationCompany = Company::getInstance();

        $company = new GraphqlField(
            field: "addCompany",
            type: $mutationCompany->build(),
            args: new GraphqlArgsCollection(
                args: [new GraphqlArg(name: "fantasyName", type: Type::nonNull(Type::string()))]
            ),
            callable: function ($root, $args) {
                return (new CompanyRepository())->add(fantasyName: $args["fantasyName"]);
            }
        );

        return [$company];
    }
}