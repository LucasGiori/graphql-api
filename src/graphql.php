<?php

use GraphQL\Type\Schema;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Server\StandardServer;
use GraphQL\Server\ServerConfig;






$queryType = new ObjectType([
    'name' => 'companies',
    'fields' => [
        'fantasyName' => [
            'type' => Type::string(),
            'resolve' => fn () => 'Hello World!',
        ]
    ]
]);

$objectType = new ObjectType([]);


$schema = new Schema([
    'query' => $queryType
]);

$schema->assertValid();

$config = ServerConfig::create()->setSchema($schema);

$server = new StandardServer($config);
$response = $server->processPsrRequest($request, $response, $response->getBody());
echo json_encode($result->toArray());