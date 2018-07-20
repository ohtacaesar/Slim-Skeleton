<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends BaseController
{
    public function home(Request $request, Response $response, $args)
    {
        $this->logger->info('/ Route');
        return $this->view->render($response, 'home.html.twig', $args);
    }
}
