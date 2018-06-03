<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 11:51 AM
 */
class Database
{
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $dbuser = DB_USER;
    private $password = DB_PASS;

    private $stmt;
    private $dbh;
    private $error;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array (
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try {
            $this->dbh = new PDO ($dsn, $this->dbuser, $this->password, $options);
        }		// Catch any errors
        catch ( PDOException $e ) {
            $this->error = $e->getMessage();
        }

    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){
        if (is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                case is_string($value):
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);

    }
    public function sum(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_COLUMN);

    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }

    public function last_insert_id(){
        return $this->dbh->lastInsertId();
    }
}

