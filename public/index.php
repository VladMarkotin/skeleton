<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../routes/web.php';

use App\Kernel\App as App;
use App\Kernel\DI\Container;
use App\Kernel\Init\InitClass as Init;

$container = new Container;

App::run($container->get(Init::class) );