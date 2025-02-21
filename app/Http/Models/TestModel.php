<?php
namespace App\Http\Models;


use App\Kernel\DataMapper\DataMapper;
use App\Http\Models\Model;

class TestModel extends Model
{
    protected $table = 'test';
    public $id;
    public $name;
    private $position = 0;

    public static function fromState( $state): TestModel
    {
        // validate state before accessing keys!
        //die(var_dump($state));
        return new self(
            $state['id'],
            $state['name']
        );
    }

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}