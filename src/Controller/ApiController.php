<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Awurth\Slim\Helper\Controller\Controller;

class ApiController extends Controller 
{
    /**
     * Carrega a documentação Swagger das APIs
     * @param Request $request
     * @param Response $response
     * @return static
     */
    public function swagger(Request $request, Response $response)
    {
        return $response->withJson($this->container->apiService->swaggerDoc(), 200);
    }

    public function login(Request $request, Response $response)
    {
        return $response->withJson($this->container->apiService->swaggerDoc(), 200);
    }
    
    public function refreshToken(Request $request, Response $response)
    {
        return $response->withJson($this->container->apiService->swaggerDoc(), 200);
    }

    public function getBreeds(Request $request, Response $response)
    {
        return $response->withJson($this->container->apiService->swaggerDoc(), 200);
    }
}
