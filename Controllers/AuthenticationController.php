<?php
namespace TrainingProject\Controllers;
use \TrainingProject\Models;

class AuthenticationController extends Controller{
     function __construct() {
        $this->model = new Models\UsersCrud();
     }

     //POST
    public function login(){
        if (!isset($_POST["submit"]) && 0){
            return;
        }

        $userId = $this->model->fetchUserId($_POST["username"]);
        if ($userId === 0){
            echo "Email Address and/or Password incorrect. Please try again.";
            return;
        }
        else{
            $_SESSION["userId"] = $userId;
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