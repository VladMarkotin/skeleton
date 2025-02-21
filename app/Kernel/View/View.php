<?php
namespace App\Kernel\View;

use \Twig\Loader\ArrayLoader;

class View
{
    private static $twig;

    public static function render(string $template, array $params = [])
    {
        echo self::$twig->render($template.$_ENV['TEMPLATE_EXTENSION'], $params);
    }

    public static function getInstance()
    {
        $loader = new \Twig\Loader\FilesystemLoader($_ENV['TEMPLATE_PATH']);
        self::$twig = new \Twig\Environment($loader);
    } 
}