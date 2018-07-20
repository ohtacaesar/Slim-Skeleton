<?php

namespace App\Controller;

use Monolog\Logger;
use Slim\Container;
use Slim\Views\Twig;

class BaseController
{
    /** @var Logger */
    protected $logger;

    /** @var Twig */
    protected $view;

    public function __construct(Container $container)
    {
        $this->logger = $container['logger'];
        $this->view = $container['view'];
    }
}
