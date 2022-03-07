<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GraphQL\Type\Schema;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Server\StandardServer;
use GraphQL\Server\ServerConfig;

$queryType = new ObjectType([
    'name' => 'books',
    'fields' => [
        'hello' => [
            'type' => Type::string(),
            'resolve' => fn () => 'Hello World!',
        ]
    ]
]);


$schema = new Schema([
    'query' => $queryType
]);

$schema->assertValid();

$config = ServerConfig::create()->setSchema($schema);

$server = new StandardServer($config);

$result = $server->executeRequest();

echo json_encode($result->toArray());