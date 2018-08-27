<?php
namespace TrainingProject\Models;

class UsersDataManager extends DataManager{
    function __construct(){
        $this->db = $this->connectToDb();
    }

    function fetchUserId($username){
        $query = sprintf("SELECT user_id FROM users WHERE username='%s'", $username);
        $user = mysqli_query($this->db, $query);

        $numUsersFound = mysqli_num_rows($user);
        if ($numUsersFound === 0){
            return $numUsersFound;
        }

        $userId = mysqli_fetch_array($user)["user_id"];
        return $userId;
    }


    function create($user){
        error_reporting(E_ALL);
        ini_set('display_errors','On');
        $email = mysqli_real_escape_string($this->db, $user["email"]);
        $username = mysqli_real_escape_string($this->db, $user["username"]);
        $password = mysqli_real_escape_string($this->db, $user["password"]);
        $fullname = mysqli_real_escape_string($this->db, $user["fullname"]);
        //TODO photo upload functionality in progress $profile_picture_file = mysqli_real_escape_string($this->db, $user["profile_picture_file"]);
        $query = sprintf("INSERT INTO users (email, username, password, fullname) VALUES('%s', '%s', '%s', '%s')", $email, $username, $password, $fullname);
        mysqli_query($this->db, $query);

        $userId = $this->fetchUserId($username);
        return $userId;
    }


    function read($userId){
        $query = sprintf("SELECT * FROM users WHERE user_id='%s'", $userId);
        $user = mysqli_fetch_array(mysqli_query($this->db, $query));
        return $user;
    }


    function update(){}


    function delete($userId){
        $userId = mysqli_real_escape_string($this->db, $userId);
        $query = sprintf("DELETE FROM users WHERE user_id='%s'", $userId);
        mysqli_query($this->db, $query);
        //TODO catch errors
    }
}

?>