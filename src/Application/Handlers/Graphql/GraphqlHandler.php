<?php

namespace App\Application\Handlers\Graphql;

use App\DomainModel\QueryModel\Base\GraphqlField;
use App\DomainModel\QueryModel\Base\GraphqlMutationAggregator;
use App\DomainModel\QueryModel\Base\GraphqlQueryAggregator;
use App\DomainModel\QueryModel\Base\GraphqlSchema;
use App\DomainModel\QueryModel\Company\RootFacade;
use App\Repository\Company\CompanyRepository;
use Fig\Http\Message\StatusCodeInterface;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\Type;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Response;

class GraphqlHandler implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $query = json_decode($request->getBody()->getContents());

        $queryAggregator = new GraphqlQueryAggregator();
        RootFacade::configure($queryAggregator);
        $mutationAggregator = new GraphqlMutationAggregator();
        RootFacade::configure($mutationAggregator);

        $schema = (new GraphqlSchema([$queryAggregator, $mutationAggregator]))->build();
        $schema->assertValid();

        $result = GraphQL::executeQuery(
            schema: $schema,
            source: $query->query,
            variableValues: !empty($query->variables) ? (array)$query->variables : null,
            operationName: $query->operationName
        );

        $stream = (new StreamFactory())->createStream(json_encode($result->jsonSerialize()));

        $response = new Response(status: StatusCodeInterface::STATUS_OK, body: $stream);
        $response->withHeader(name: "Content-Type", value: "application/json");

        return $response;
    }
}