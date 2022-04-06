<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use PHPUnit\Framework\TestCase;

class CompanyQueryTest extends TestCase
{
    public function testQuerySuccess()
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
        $this->assertEquals(
            expected: '{"data":{"companies":[{"fantasyName":"Boa Compra by PagSeguro"},{"fantasyName":"Gazin Tech"},{"fantasyName":"Fiscontech"}]}}',
            actual: $result->getBody()->getContents()

        );
    }

    public function testMutationSuccess()
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
                        mutation AddCompany($fantasyName: String) {
                            addCompany(fantasyName: $fantasyName) {
                                id
                            }
                        }
                    ',
                    "operationName" => "AddCompany",
                    "variables" => [
                        "fantasyName" => "Lucas Giori TECH"
                    ]
                ]
            ]
        );
        $this->assertEquals(expected: 200, actual: $result->getStatusCode());
        var_dump($result->getBody()->getContents());
    }
}