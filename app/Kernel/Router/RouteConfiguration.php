<?php
namespace App\Kernel\Router;


class RouteConfiguration
{
    public string $route = '';

    public string $controller;

    public string $action;

    public string $name;

    public function __construct(string $route, string $controller, string $action)
    {
        $this->route = $route;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function name($name)
    {
        $this->name = $name;

        return $this;
    }
}