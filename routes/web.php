<?php

use App\Kernel\Router\Router;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\LoginController;

Router::get('/', [IndexController::class, 'index']);

Router::get('/test', [TestController::class, 'index']);

Router::get('/test2/{q}', [TestController::class, 'test2']);
Router::get('/feedback', [FeedbackController::class, 'index']);
Router::get('/login', [LoginController::class, 'index']);
Router::get('logout', [LoginController::class, 'logout']);

/**post-routes */
Router::post('send-feedback', [FeedbackController::class, 'handle']);
Router::post('auth', [LoginController::class, 'auth']);