<?php
namespace App\Http\Controllers;


use App\Facades\DB\DB;
use App\Kernel\DB\QueryBuilder\Builder;
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
        $mapper = new TestMapper($this->storage);
        //you can get data from mapper
        $row = $mapper->findById(1);
        //$rows = $mapper->all();
        
        //or you can get by sql query throw special DB facade
        //$result = DB::query("Select * from `test` ", $this->container->get(DBCollection::class));
        
        
        //or you can use QueryBuilder
        $builder = $this->container->get(Builder::class);
        $rows = $builder->select(['*'])
          ->from('test')
          ->where('id', '=', 1)
          ->or('name', 'like', '%s%')
          ->get();

        return View::render('index', ['title' => 'Index Page', 'result' => $rows]);
    }

    private function initStorage()
    {
        $this->storage = new DataMapper(
                           DB::query("Select * from `test` ",
                           $this->container->get(DBCollection::class)
                        ));
    }
}