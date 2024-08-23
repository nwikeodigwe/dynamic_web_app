<?php
namespace Core;
use PDO;
use Core\Response;

class Database{
    public $connection;
    public $statement;

    public function __construct($config, $user = 'root', $password = '1q2w3e4r5t'){


        $dsn = 'mysql:'. http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = []){
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;

    }

    public function findAll() {
        return $this->statement->fetchAll();
    }

    public function find() {
        return $this->statement->fetch();
    }

    public function findOrFail() {
        $result =  $this->find();

        if(!$result){
            abort(Response::NOT_FOUND);
        }

        return $result;
    }

    
}