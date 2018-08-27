<?php
namespace TrainingProject\Models;

class DataManager{
    private $db;
    private $result;

    function __construct(){
        $this->db = $this->connectToDb();
    }

    private function connectToDb(){
        $db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"], "trainingproject");
        return $db;
    }

    public function query($query){
        $this->result = mysqli_query($this->db, $query);
    }

    public function fetchAll(){
        $rows = array();
        while($row = $this->fetch()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function fetch(){
        return mysqli_fetch_assoc($this->result);
    }

    public function rowCount(){
        return mysqli_num_rows($this->result);
    };

}