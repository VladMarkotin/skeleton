<?php
namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Kernel\View\View;
use App\Facades\Request\Request;
use App\Facades\Auth\Auth;
use App\Facades\Response\Response;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return View::render('auth/login', ['title' => 'Login Page',]);
    }

    public function auth(Request $request)
    {
        Auth::auth($request->getDataAsArray());
        Response::away('/');    }

    public function logout()
    {
        Auth::logout();
        Response::away('/login');
    }
}