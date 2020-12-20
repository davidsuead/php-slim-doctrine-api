<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Awurth\Slim\Helper\Controller\Controller;

class AppController extends Controller 
{
    /**
     * Carrega a página inicial da aplicação
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response) : Response
    {
        return $this->render($response, 'app/index.twig');
    }

    /**
     * Carrega a página de erro 401
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function error401(Request $request, Response $response) : Response
    {
        return $this->render($response, 'app/error/401.twig');
    }

    /**
     * Carrega a página de erro 403
     * @param Request $request Classe Request Slim
     * @param Response $response Classe Response Slim
     * @return Response
     */
    public function error403(Request $request, Response $response) : Response
    {
        return $this->render($response, 'app/error/403.twig');
    }

    /**
     * Carrega a página de erro 404
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function error404(Request $request, Response $response) : Response
    {
        return $this->render($response, 'app/error/404.twig');
    }

    /**
     * Carrega a página de erro 4xx
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function error4xx(Request $request, Response $response) : Response
    {
        return $this->render($response, 'app/error/4xx.twig');
    }

    /**
     * Carrega a página de erro 500
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function error500(Request $request, Response $response) : Response
    {
        return $this->render($response, 'app/error/500.twig');
    }
}
