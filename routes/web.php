<?php

use App\Kernel\Router\Router;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TestController;

Router::get('/', [IndexController::class, 'index']);

Router::get('/test', [TestController::class, 'index']);

Router::get('/test2/{q}', [TestController::class, 'test2']);