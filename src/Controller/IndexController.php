<?php

namespace SPA\Controller;

use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class IndexController
{
    /**
     * @var PhpRenderer
     */
    private $view;

    /**
     * IndexController constructor.
     *
     * @param PhpRenderer $view
     */
    public function __construct(PhpRenderer $view)
    {
        $this->view = $view;
    }

    public function index(ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'index.html');
    }
}
