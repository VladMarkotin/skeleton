<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Kernel\View\View;
use App\Facades\Request\Request;

class FeedbackController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return View::render('feedback', ['title' => 'Feedback Page',]);
    }

    public function handle(Request $request)
    {
        $data = $request->getDataAsArray();
        dd($data);
    }
}