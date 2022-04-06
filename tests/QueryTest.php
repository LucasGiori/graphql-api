<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    public function testQueryResult()
    {
        $client = new Client();
        $result = $client->post(
            uri: "http://nginx",
            options :  [
                RequestOptions::HEADERS => [
                    "Content-Type" => "application/json",
                    "Accept" => "application/json"
                ],
                RequestOptions::JSON =>  [
                    "query" => '
                        query GetCompanies {
                            companies {
                                fantasyName
                            }
                        }
                    ',
                    "operationName" => "GetCompanies"
                ]
            ]
        );
        $this->assertEquals(expected: 200, actual: $result->getStatusCode());
        $this->assertNotNull($result->getBody());
    }
}