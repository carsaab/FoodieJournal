<?php
namespace TrainingProject\Controllers;
use \TrainingProject\Models;
use \TrainingProject\DataAccess;

class AuthenticationController extends Controller{
     function __construct() {
        $this->databaseGateway = new DataAccess\UsersDBGateway();
     }

     //POST
    public function login(){
        require_once ("C:\PersonalProjects\TrainingProject\Views\login.html"); //TODO don't hardcode path

        if (!isset($_POST["submit"])){
            return;
        }

        $userId = $this->databaseGateway->fetchUserId($_POST["username"]);
        if ($userId === 0){
            echo "Email Address and/or Password incorrect. Please try again.";
            return;
        }
        else{
            $_SESSION["userId"] = $userId;
            $_SESSION["username"] = $_POST["username"];
            $this->redirect("/");
        }
    }

    public function logout(){
        if(isset($_SESSION["userId"])){
            unset($_SESSION["userId"]);
        }
        $this->redirect('/login');
    }

}