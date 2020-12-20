<?php

namespace App\Swagger;

/**
 * Classe que define a documentação da tag Authentication
 * @author David Diniz <diniz.david@gmail.com>
 * @since 1.0.0
 */
class AuthTag extends AbstractTag
{
    /**
     * Define documentação do endpoint postLogin
     *
     * @return void
     */
    private function setLogin() : void
    {
        $pathName = "/login";

        $path = new \stdClass();
        $path->post = new \stdClass();
        $path->post->tags = ["{$this->tag['name']}"];
        $path->post->summary = "User login";
        $path->post->description = "Endpoint que autentica usuário e retorna um token jwt";
        $path->post->operationId = "postLogin";
        $path->post->produces = ["application/json"];
        $this->swagger->paths[$pathName] = $path;

        $this->setParameters($pathName, [
            [
                'name' => 'Parametros',
                'description' => 'Objeto com dados para persistência',
                'type' => false,
                'in' => 'body',
                'schema' => [
                    '$ref' => "#/definitions/paramsLogin"
                ],
            ]
        ], false, 'post');

        $definitions = [
            'paramsLogin' => [
                'type' => 'object',
                'properties' => [
                    'username' => ['type' => 'string'],
                    'password' => ['type' => 'string'],
                ]
            ],
        ];
        $this->setDefintions($definitions);

        // HTTP Response (200) Success
        $this->setDefaultResponse($pathName, 200,'retLogin200', [
            'accessToken' => 'string',
            'refreshToken' => 'string',
        ], null, 'post');

        /**
         * HTTP Response (400) Bad Request
         * HTTP Response (401) Unauthorized
         * HTTP Response (500) Internal Server Error
         */
        $this->setManyDefaultResponse($pathName, [400,401,500], [], [], [], 'post');
    }

    /**
     * Define documentação do endpoint postRefreshToken
     *
     * @return void
     */
    private function setRefreshToken() : void
    {
        $pathName = "/refresh-token";

        $path = new \stdClass();
        $path->post = new \stdClass();
        $path->post->tags = ["{$this->tag['name']}"];
        $path->post->summary = "Refresh access token";
        $path->post->description = "Endpoint que renova o access token";
        $path->post->operationId = "postRefreshToken";
        $path->post->produces = ["application/json"];
        $this->swagger->paths[$pathName] = $path;

        $this->setParameters($pathName, [
            [
                'name' => 'refreshToken',
                'description' => 'Token de atualização',
            ],
        ], false, 'post');

        // HTTP Response (200) Success
        $this->setDefaultResponse($pathName, 200,'retRefreshToken200', [
            'accessToken' => 'string',
            'refreshToken' => 'string',
        ], null, 'post');

        /**
         * HTTP Response (400) Bad Request
         * HTTP Response (401) Unauthorized
         * HTTP Response (500) Internal Server Error
         */
        $this->setManyDefaultResponse($pathName, [400,401,500], [], [], [], 'post');
    }

    /**
     * Define todas as documentações de endpoint da tag USUARIOS
     *
     * @return void
     */
    public function setRoutes() : void
    {
        $this->setLogin();
        $this->setRefreshToken();
    }
}