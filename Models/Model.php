<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 11/20/16
 * Time: 10:37 PM
 */
namespace Models;

use bootstrap\ConnectionFactory;

class Model
{

    private $connection;

    private $table;

    public function __construct()
    {
        $this->connection = ConnectionFactory::connection();

        $this->table = strtolower(explode('\\', get_called_class())[1] . 's');
    }

    public function query($sql)
    {
        $collection = $this->connection->get($sql,get_called_class());
        if (count($collection) == 1) {
            return $collection[0];
        }
        return $collection;
    }

    public function update($sql)
    {
        return $this->connection->query($sql);
    }

    public static function all()
    {
        $instance = new static;
        return $instance->query('select * from ' . $instance->table);
    }

    public static function find($id)
    {
        $instance = new static;
        return $instance->query('select * from ' . $instance->table . ' where id=' . $id);
    }

    public function inc($column, $num = 1)
    {
        $count = $this->$column;
        $count = $count + $num;
        $sql = 'update ' . $this->table . " set $column=$count where id=" . $this->id;
        return $this->update($sql);
    }

//    public static function __callStatic($name, $arguments)
//    {
//        echo $name,$arguments;
//        die;
//    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

