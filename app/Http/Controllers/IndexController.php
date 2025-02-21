<?php
namespace App\Http\Controllers;


use App\Facades\DB\DB;
use App\Facades\Collections\DBCollection;
use App\Http\Controllers\Controller;
use App\Kernel\View\View;
use App\Kernel\DataMapper\DataMapper;
use App\Http\Models\Mappers\TestMapper;
use App\Http\Models\TestModel;

class IndexController extends Controller
{
    private $storage;

    public function __construct()
    {
        parent::__construct();
        $this->initStorage();
    }
    
    public function index()
    {
        //$result = DB::query("Select * from `test` ", $this->container->get(DBCollection::class));
        $mapper = new TestMapper($this->storage);
        $row = $mapper->findById(1);
        $rows = $mapper->all();
        //$testModel = TestModel::fromState($mapper);
        // var_dump($rows);
        //     die;
        
        return View::render('index', ['title' => 'Index Page 2', 'result' => $rows]); //$row->toArray()
    }

    private function initStorage()
    {
        $this->storage = new DataMapper(
                           DB::query("Select * from `test` ",
                           $this->container->get(DBCollection::class)
                        ));
    }
}