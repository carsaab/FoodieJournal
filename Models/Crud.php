<?php
namespace TrainingProject\Models;

abstract class Crud{
    protected $db;

    protected function connectToDb(){
        $db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"], "trainingproject");
        return $db;
    }
}