<?php
namespace TrainingProject\Models;

class User {
    public $user_id;
    public $email;
    public $username;
    public $password;
    public $fullname;
    public $created;

    public function __construct($user_id, $email, $username, $password, $fullname, $created) {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->created = $created;
    }

    public static function fromArray($arr) {
        return new User($arr['user_id'], $arr["email"], $arr["username"], $arr["password"], $arr["fullname"], $arr['created']);
    }

    /* Takes an array of associative arrays (containing the members of User) as input,
    returns an indexed array of Users*/
    public static function fromArrays($arrays) {
        return array_map(function ($arr) {
            return User::fromArray($arr);
        }, $arrays);
    }

    public function jsonSerialize() {
        return [
            'user_id' => $this->user_id,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            'fullname' => $this->fullname,
            'created' => $this->created
        ];
    }

}