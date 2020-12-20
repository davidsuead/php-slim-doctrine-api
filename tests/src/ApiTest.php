<?php

namespace Tests;

use Tests\Tester;
use Httpful\Request;
use stdClass;

final class ApiTest extends Tester
{
    /**
     * Se o usuário existi, deve retornar um objeto User
     *
     * @return array
     */
    public function testLogin() : string
    {
        $url = 'http://api.local.slim.com.br/login';
        $response = Request::post($url)
        ->body(['username' => 'admin', 'password' => '@#$RF@!718'])
        ->sendsJson()
        ->send();

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->body->accessToken);

        return $response->body->accessToken;
    }

    /**
     * Valida a rota http://api.local.slim.com.br/breeds
     * @depends testLogin
     * @return void
     */
    public function testBreeds(string $accessToken) : void
    {
        $url = 'http://api.local.slim.com.br/breeds?name=' . $this->container->utilService->antiInjection('sib');
        $response = Request::get($url)
        ->addHeader('Authorization', 'Bearer ' . $accessToken)
        ->send();

        $this->assertSame(200, $response->code);
        $this->assertNotEmpty($response->body);
        $this->assertNotEmpty($response->body->breeds[0]->id);
        $this->assertStringContainsString('sib', strtolower($response->body->breeds[0]->name));
    }
}