<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 11/20/16
 * Time: 10:37 PM
 */
namespace Models;

class Model
{

    private $pdo;

    private $table;

    public function __construct()
    {
        $config = [
            'DB_CONNECTION' => 'mysql',
            'DB_HOST'       => '127.0.0.1',
            'DB_PORT'       => '3306',
            'DB_DATABASE'   => 'statistics',
            'DB_USERNAME'   => 'root',
            'DB_PASSWORD'   => 'root',
        ];

        $dsn = $config['DB_CONNECTION'] . ":host=" . $config['DB_HOST'] . ";dbname=" . $config['DB_DATABASE'];

        $pdo = new \PDO($dsn, $config['DB_USERNAME'], $config['DB_PASSWORD']);

        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $pdo->exec('set names utf8');

        $this->pdo = $pdo;

        $this->table = strtolower(explode('\\', get_called_class())[1] . 's');
    }

    public function query($sql)
    {
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $collection = [];
        while ($record = $query->fetchObject(get_called_class())) {
            $collection[] = $record;
        }
        if(count($collection)==1){
            return $collection[0];
        }
        return $collection;
    }

    public function update($sql)
    {
        $query = $this->pdo->prepare($sql);
        $query->execute();
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

    public function inc($column)
    {
        $count = $this->$column;
        $count++;
        $sql = 'update '.$this->table." set $column=$count where id=".$this->id;
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

