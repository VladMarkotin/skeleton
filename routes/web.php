<?php

use App\Kernel\Router\Router;
use App\Http\Controllers\IndexController;

Router::get('/', [IndexController::class, 'index']);