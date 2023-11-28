<?php

namespace Core;

use PDO;

// connect to MYSQL database PDO (PHP,DATA,OBJECTS) is used
//dsn (data source name): a string that declares your connection to the database(What port,name of db)

//connect to a database and execute a query
// Whenever you have a PHP file that only contains a class it's a general convention that the file name should be capital
class Database{
    public $connection; //property will be available to other methods in the class
    public $statement;
    public function __construct($config,$username='root',$password=''){ //automatically called by the PHP interpreter


        $dsn = "mysql:" . http_build_query($config,'',';');

        $this->connection = new PDO($dsn,$username,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ]);
    }
    public function query($query,$params=[]){
        $this->statement = $this->connection->prepare($query); //prepare takes in a query
        $this->statement->execute($params); //execute the query
        return $this;
    }
    public function get(){
        return $this->statement->fetchAll();
    }
    public function find(){
        return $this->statement->fetch();
    }
    public function findOrFail(){
        $result = $this->find();
        if(!$result){
            abort();
        }
        return $result;
    }
}