<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 11/22/16
 * Time: 11:26 PM
 */
namespace bootstrap;

class MySqlConnector implements Connection
{

    private $pdo;
    private $query;

    public function __construct(array $config)
    {
        $dsn = $config['DB_CONNECTION'] . ":host=" . $config['DB_HOST'] . ";dbname=" . $config['DB_DATABASE'];

        $pdo = new \PDO($dsn, $config['DB_USERNAME'], $config['DB_PASSWORD']);

        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->pdo = $pdo;
    }

    public function exec($query)
    {
        return $this->pdo->exec($query);
    }

    public function query($sql)
    {
        $this->query = $this->pdo->prepare($sql);
        return $this->query->execute();
    }

    public function get($sql,$class)
    {
        $collection = [];
        $query = $this->pdo->prepare($sql);
        $query->execute();
        while ($record = $query->fetchObject($class)) {
            $collection[] = $record;
        }
        return $collection;
    }

}