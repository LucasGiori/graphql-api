<?php

namespace App;

use Guzzle\Http\Client;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    public function testQueryResult()
    {
        $client = new Client(baseUrl: 'http://localhost:8000');
        $result = $client->post(uri: "", options : [
            "form_params" => [
                "data"=> [
                    "query" => [
                        "
                            books {
                                hello
                            }
                        "
                    ]
                ]
            ]
        ]);

        var_dump($result->getBody());
        $this->assertNotNull($result->getBody());
    }
}