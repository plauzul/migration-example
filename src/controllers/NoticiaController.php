<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use src\model\NoticiaModel;

class NoticiaController extends BaseController
{

    /**
     * Retorna todas as noticias
     * 
     */
    public function fetchAll(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        try {
            $mNoticia  = new NoticiaModel();
            $rNoticia = $mNoticia
                ->select()
                ->order('created_at DESC')
                ->limit(100)
                ->query()
                ->fetchAll();
            return $response->withJson($rNoticia);
        } catch(Exception $e) {
            $this->container->get('logger')->error("Route: '/v1/noticia' Error: " . $e->getMessage());
            return $response->withJson(['message' => $e->getMessage()], $e->getCode() == 0 ? 500 : $e->getCode());
        }
    }
}