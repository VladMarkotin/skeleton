<?php
namespace App\Kernel\DI;


use App\Kernel\Init\InitClass;
use App\Facades\Collections\DBCollection;

class Container
{
    private $objects = [];

    public function __construct()
    {
        // Ключи в этом массиве - строковые ID объектов
        // Значения - функции, строящие нужный объект
        $this->objects = [
            
            InitClass::class => function (){ return new InitClass();},
            DBCollection::class => function () {return new DBCollection();},
            
        ];
    }

    public function has(string $id): bool
    {
        return isset($this->objects[$id]);
    }

    public function get(string $id): mixed
    {
        return $this->objects[$id]();
    }
}