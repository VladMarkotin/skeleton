<?php
namespace App\Http\Models;


use App\Kernel\DB;

class Model
{
    public static function all()
    {

    }

    public function toArray(): array
    {
         $publicProperties = [];

        // Работаем с ReflectionClass для анализа объекта
        $reflection = new \ReflectionClass($this);

        // Получаем свойства с их доступом и фильтруем только публичные
        foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $name = $property->getName();
            $publicProperties[$name] = $this->$name; // Получаем значение свойства
        }

        return $publicProperties;
        return get_object_vars($this);
    }
}
