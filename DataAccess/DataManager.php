<?php
namespace TrainingProject\DataAccess;

class DataManager{
    private $database;
    private $result;

    function __construct(){
        $this->database = $this->connectToDb();
    }

    private function connectToDb(){
        $database = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"], "trainingproject");
        return $database;
    }

    public function query($query){
        //$query = mysqli_real_escape_string($this->database, $query);
        $this->result = mysqli_query($this->database, $query);
    }

    public function fetchAll(){
        $rows = array();
        while($row = $this->fetch()){
            $rows[] = $row;
        }
        return $rows;
        //TODO Why not return $result? let's check this out in the debugger
    }

    public function getLastInsertId(){
        return mysqli_insert_id($this->database);
    }

    public function fetch(){
        return mysqli_fetch_assoc($this->result);
    }

    public function rowCount(){
        return mysqli_num_rows($this->result);
    }

}