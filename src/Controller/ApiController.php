<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Awurth\Slim\Helper\Controller\Controller;
use Exception;

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
    
    /**
     * Realiza o login do usuário
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function login(Request $request, Response $response) : Response
    {
        $result = $this->container->apiService->login($request);
        return $response->withJson($result['data'], $result['statusCode']);
    }
    
    /**
     * Atualiza o access token do usuário
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function refreshToken(Request $request, Response $response) : Response
    {
        $result = $this->container->apiService->refreshToken($request);
        return $response->withJson($result['data'], $result['statusCode']);
    }

    /**
     * Retorna lista de objeto de raças de gato pelo nome
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getBreeds(Request $request, Response $response) : Response
    {
        try {
            $result = $this->container->apiService->getBreeds($request);
            return $response->withJson($result['data'], $result['statusCode']);
        } 
        catch (Exception $ex) {
            $this->container->monolog->error('Erro durante a requisição da rota "breeds" ' . get_class($ex), [
                'exception' => $ex
            ]);
            $statusCode = $this->container->constante['HTTP_STATUS_CODE']['INTERNAL_ERROR'];
            $data['message'] = $ex->getMessage();
            return $response->withJson($data, $statusCode);
        }
    }
}
