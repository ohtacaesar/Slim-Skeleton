<?php
// DIC configuration

$container = $app->getContainer();

$container['uri'] = function () {
    return \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
};

$container['view'] = function (\Slim\Container $c) {
    $settings = $c->get('settings')['view'];
    $view = new \Slim\Views\Twig($settings['template_path'], $settings);
    $view->addExtension(new \Slim\Views\TwigExtension($c->get('router'), $c->get('uri')));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};

// monolog
$container['logger'] = function (\Slim\Container $c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['session'] = function () {
    session_start();
    return $_SESSION;
};
