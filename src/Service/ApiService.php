<?php

namespace App\Service;

use Exception;
use Slim\Http\Request;
use App\Entity\Token;
use App\Swagger\SwaggerDoc;
use App\Validation\LoginValidation;

/**
 * Service para manipular Regras de Negócio de APIs
 * @author David Diniz <diniz.david@gmail.com>
 */
class ApiService 
{
    /**
     * Relação nome da coluna no banco de dados com o parâmetro utilizado na API
     *
     * @var array
     */
    protected $colsToParams = [];

    /**
     * Recipiente para injeção de dependência
     *
     * @var ContainerInterface
     */
    private $container;

    /**
     * Na construção da classe define o recipiente de injeção de dependência
     *
     * @param ContainerInterface $container
     */
    public function __construct($container) 
    {
        $this->container = $container;
    }

    /**
     * Faz a documentação no padrão Swagger 2.0
     * @return array Estrutura de dados para documentação Swagger 2.0
     */
    public function swaggerDoc() 
    {
        $swaggerDoc = new SwaggerDoc($this->container);
        $swaggerDoc->init();
        return $swaggerDoc->getSwaggerDoc();
    }

    /**
     * Retorna a descrição do parâmetro relacionado ao nome do campo
     *
     * @param string $name - Nome da coluna no banco de dados
     * @return string
     */
    public function getParamName($name) : string
    {
        return $this->colsToParams[$name] ?? $name;
    }

    /**
     * Retorna o primeiro erro encontrado da validação dos parâmetros de entrada
     *
     * @return string|null
     */
    public function getApiErrors() : ?string
    {
        if(!$this->container->validator->isValid()) {
            $errors = $this->container->validator->getErrors();
            foreach($errors as $field => $error) {
                foreach($error as $message) {
                    if($field == 'error') {
                        return $message;
                    } else {
                        return $this->getParamName($field) . ': ' . $message;
                    }
                }
            }
        }
        return null;
    }

    /**
     * Valida a entrada da API
     *
     * @param Request $request
     * @param string $scenario
     * @return integer
     */
    public function validate(Request $request, string $scenario) : int
    {
        $params = $request->getParams();
        if(isset($params['Authorization'])) {
            unset($params['Authorization']);
        }
        $params['Authorization'] = $request->getHeader('HTTP_AUTHORIZATION')[0] ?? null;
        
        switch ($scenario) {
            case $this->container->constante['SCENARIO']['LOGIN']:
                $validation = new LoginValidation($this->container);
                break;
            case $this->container->constante['SCENARIO']['REFRESH_TOKEN']:
            case $this->container->constante['SCENARIO']['GET_BREEDS']:
                $validation = new LoginValidation($this->container);
                break;
        }
        $this->container->validator->array($params, $validation->getRules());
        $validation->customValidate($request);

        return $validation->getCode();
    }
    
    /**
     * Realiza o login do usuário
     *
     * @param Request $request
     * @return array[data,statusCode]
     */
    public function login(Request $request) : array
    {
        $this->container->em->beginTransaction();
        try {
            $statusCode = $this->validate($request, $this->container->constante['SCENARIO']['LOGIN']);
            if ($this->container->validator->isValid()) {
                $params = $request->getParams();
                
                /** @var Token $token */
                $token = $this->container->tokenService->generateToken($params['username']);

                $data = [
                    'accessToken' => $token->getToken(),
                    'refreshToken' => $token->getRefreshToken()
                ];
                $this->container->em->commit();
            } 
            else {
                $data['message'] = $this->getApiErrors();
            }
        } catch (Exception $ex) {
            $this->container->em->rollback();
            $this->container->monolog->error('Erro durante a requisição da rota "login" ' . get_class($ex), [
                'exception' => $ex
            ]);
            $statusCode = $this->container->constante['HTTP_STATUS_CODE']['INTERNAL_ERROR'];
            $data['message'] = $ex->getMessage();
        }

        return ['data' => $data, 'statusCode' => $statusCode];
    }
}
