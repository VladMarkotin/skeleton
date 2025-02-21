<?php
namespace App\Kernel\DataMapper;


class DataMapper
{
    protected array $data = [];

    public function __construct(array $data = null)
    {
        $this->data = $data;
    }
    
    /**
     * @return array|null
     */
    public function find(int $id)
    {
        //var_dump($id);
        //var_dump($this->data);
        //echo "DataMapper find";
        //var_dump(($this->data[$id]));
        //die;
        // if ( isset($this->data[$id]) ) {
        //     //die(var_dump($this->data[$id]));
        //     return $this->data[$id];
        // }
        if ($this->data) {
            foreach ($this->data as $v) {
                $result[$v['id']] = $v;
            }
            //die(var_dump($result));
            return $result[$id];
        }

        return null;
    }

    public function getData(): array
    {
        return $this->data;
    }
}