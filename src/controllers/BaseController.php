<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Container;

abstract class BaseController
{
    protected $container;
    protected $view;

    /**
     * Rest constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->view      = $container->get('renderer');
    }
}