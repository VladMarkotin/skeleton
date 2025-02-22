<?php
namespace App\Http\Controllers;


use App\Kernel\DB\QueryBuilder\Builder;
use App\Facades\Collections\DBCollection;
use App\Http\Controllers\Controller;
use App\Kernel\View\View;

class TestController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $builder = $this->container->get(Builder::class);
        $rows = $builder->select(['*'])->from('test2')
          ->where('id', '=', 1)
          ->or('name', 'like', '%s%')
          ->get();

        return View::render('test', ['title' => 'Test Page', 'result' => $rows]);
    }
}