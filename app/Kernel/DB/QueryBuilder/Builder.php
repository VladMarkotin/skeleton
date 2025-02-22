<?php
namespace App\Kernel\DB\QueryBuilder;


use App\Kernel\DB\QueryBuilder\Helpers\HandleParams as HP;
use App\Facades\DB\DB;
use App\Facades\Collections\DBCollection;

class Builder
{
    use Operators\Conditions;
    
    private $query;
    private $collector;

    public function __construct(DBCollection $collector)
    {
        $this->collector = $collector;
    }

    public function select(array $args = ['*'])
    {
        $this->query = "SELECT ".HP::handleSelectParams($args);

        return $this;
    }

    public function from(string $table)
    {
        $this->query .= " FROM $table ";

        return $this;
    }

    public function sql()
    {
        return $this->query;
    }

    public function get()
    {
        return DB::query($this->query, $this->collector);
    }
}