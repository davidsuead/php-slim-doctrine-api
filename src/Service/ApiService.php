<?php

namespace App\Service;

use App\Swagger\SwaggerDoc;

/**
 * Service para manipular Regras de Negócio de APIs
 * @author David Diniz <diniz.david@gmail.com>
 */
class ApiService 
{

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
}
