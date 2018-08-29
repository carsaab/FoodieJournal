<?php
namespace TrainingProject\DataAccess;
use \TrainingProject\Models;

class UsersDBGateway{

    private $database;

    function __construct(){
        $this->database = new DataManager();
    }

    function fetchUserId($username){
        $query = "SELECT user_id FROM users WHERE username='$username'";
        $this->database->query($query);

        $numUsersFound = $this->database->rowCount();
        if ($numUsersFound === 0){
            return $numUsersFound;
        }

        $userId = $this->database->fetch()["user_id"];
        return $userId;
    }


    function create($user){
        //TODO photo upload functionality in progress $profile_picture_file = mysqli_real_escape_string($this->db, $user["profile_picture_file"]);
        $query = "INSERT INTO users (email, username, password, fullname)
                  VALUES({$user['email']}, {$user['username']}, {$user['password']}, {$user['fullname']})";
        $this->database->query($query);

        $userId = $this->database->getLastInsertId();
        return $userId;
    }


    function read($userId){
        $query = "SELECT * FROM users WHERE user_id='{$userId}'";
        $this->database->query($query);
        return Models\User::fromArray($this->database->fetch());
    }


    function update(){}


    function delete($userId){
        $query ="DELETE FROM users WHERE user_id='{$userId}'";
        mysqli_query($this->db, $query);
        //TODO catch errors
    }
}