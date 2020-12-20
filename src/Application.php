<?php

namespace App;

use Slim\App;

class Application extends App 
{
    /**
     * @var string
     */
    protected $environment;

    /**
     * @var string
     */
    protected $rootDir;

    /**
     * Inicializando a aplicação
     *
     * @param string $environment
     */
    public function __construct($environment) 
    {
        $this->environment = $environment;
        $this->rootDir = $this->getRootDir();

        parent::__construct($this->loadConfiguration());
        $this->configureContainer();
        $this->loadConstantes();
        $this->registerHandlers();
        $this->loadMiddleware();
        $this->registerControllers();
        $this->loadRoutes();
        $this->configureDoctrine();
    }

    /**
     * Retorna o caminho da pasta cache para o uso do Twig
     *
     * @return string
     */
    public function getCacheDir() : string
    {
        return $this->getRootDir() . '/var/cache/' . $this->environment;
    }

    /**
     * Retorna o caminho da pasta de configuração da aplicação
     *
     * @return string
     */
    public function getConfigurationDir() : string
    {
        return $this->getRootDir() . '/config';
    }

    /**
     * Retorna o tipo de ambiente: dev, test, hom ou prod
     *
     * @return string
     */
    public function getEnvironment() : string
    {
        return $this->environment;
    }

    /**
     * Retorna o caminho da pasta que armazena os logs da aplicação
     *
     * @return string
     */
    public function getLogDir() : string
    {
        return $this->getRootDir() . '/var/log';
    }

    /**
     * Retorna o caminho do diretório raiz da aplicação e
     * injeta no container o caminho do diretório raiz
     *
     * @return string
     */
    public function getRootDir() : string
    {
        if (null === $this->rootDir) {
            $this->rootDir = dirname(__DIR__);
        }
        $app = $this;
        $container = $this->getContainer();
        $container['rootDir'] = $this->rootDir;
        return $this->rootDir;
    }

    /**
     * Carrega o container da aplicação
     *
     * @return void
     */
    protected function configureContainer() : void
    {
        $app = $this;
        $container = $this->getContainer();
        require $this->getConfigurationDir() . '/container.php';
    }
    
    /**
     * Retorna as configurações do Slim
     *
     * @return array
     */
    protected function loadConfiguration() : array
    {
        $app = $this;
        $configuration = [
            'settings' => require $this->getConfigurationDir() . '/slim.php'
        ];

        if (file_exists($this->getConfigurationDir() . '/config.' . $this->getEnvironment() . '.php')) {
            $configuration['settings'] += require $this->getConfigurationDir() . '/config.' . $this->getEnvironment() . '.php';
        } else {
            $configuration['settings'] += require $this->getConfigurationDir() . '/config.php';
        }
        return $configuration;
    }

    /**
     * Carrega o middleware da aplicação
     *
     * @return void
     */
    protected function loadMiddleware() : void
    {
        $app = $this;
        $container = $this->getContainer();
        require $this->getConfigurationDir() . '/middleware.php';
    }

    /**
     * Carrega as rotas da aplicação
     *
     * @return void
     */
    protected function loadRoutes() : void
    {
        $app = $this;
        $container = $this->getContainer();
        require $this->getConfigurationDir() . '/routes.php';
    }

    /**
     * Carrega as controllers da aplicação
     *
     * @return void
     */
    protected function registerControllers() : void
    {
        $container = $this->getContainer();
        $app = $this;
        if (file_exists($this->getConfigurationDir() . '/controllers.php')) {
            $controllers = require $this->getConfigurationDir() . '/controllers.php';
            foreach ($controllers as $key => $class) {
                $container[$key] = function ($container) use ($class) {
                    return new $class($container);
                };
            }
        }
    }

    /**
     * Carrega os handlers da aplicação
     *
     * @return void
     */
    protected function registerHandlers() : void
    {
        $container = $this->getContainer();
        require $this->getConfigurationDir() . '/handlers.php';
    }

    /**
     * Carrega as configurações do doctrine
     *
     * @return void
     */
    protected function configureDoctrine() : void
    {
        $app = $this;
        $container = $this->getContainer();
        $container['em'] = function ($container) {
            require $this->getConfigurationDir() . '/doctrine.php';
            return $entityManager;
        };
    }

    /**
     * Carrega as constantes da aplicação
     *
     * @return void
     */
    protected function loadConstantes() : void
    {
        $app = $this;
        $container = $this->getContainer();
        $container['constante'] = require $this->getConfigurationDir() . '/constantes.php';
    }
}
