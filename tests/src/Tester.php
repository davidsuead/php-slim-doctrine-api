<?php

namespace Tests;

use App\Application;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;
use Psr\Container\ContainerInterface;

class Tester extends TestCase
{
    /**
     * Objeto Application
     *
     * @var Application
     */
    protected $app;

    /**
     * Recipiente para injeção de dependência
     *
     * @var ContainerInterface
     */
    protected $container;

    public function __construct()
    {
        parent::__construct();
        (new Dotenv())->load(__DIR__ . '/../../.env');
        $this->app = new Application('dev');
        $this->container = $this->app->getContainer();
    }
}