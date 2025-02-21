<?php
namespace App\Http\Models\Mappers;


use App\Kernel\DataMapper\DataMapper;
use App\Http\Models\TestModel;

class TestMapper
{
    private $mapper = null;

    public function __construct(DataMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * finds a user from storage based on ID and returns a User object located
     * in memory. Normally this kind of logic will be implemented using the Repository pattern.
     * However the important part is in mapRowToUser() below, that will create a business object from the
     * data fetched from storage
     */
    public function findById(int $id)
    {
        $result = $this->mapper->find($id);
        //die(var_dump($result));
        if ($result === null) {
            throw new \InvalidArgumentException("User #$id not found");
        }

        return $this->mapRowToId($result);
    }

    public function all()
    {
        $collection = [];
        $result = $this->mapper->getData();
        //die(var_dump($result));
        if ($result === null) {
            throw new \InvalidArgumentException("User # not found");
        }

        foreach ($result as $k => $v) {
            $collection[$k] = $this->mapRowToId($v);
        }

        return $collection;
    }

    private function mapRowToId(array $row): TestModel
    {
        return TestModel::fromState($row);
    }
}