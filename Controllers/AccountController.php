<?php
namespace TrainingProject\Controllers;
use \TrainingProject\Models;

class AccountController extends Controller{

    function __construct() {
        $this->model = new Models\UsersCrud();
    }

    //GET
    function manage(){
        /*TODO get the username variable from the session
        * extract it into the manange account view */
    }



    //POST
    function create(){
        echo "SESSION ID - CREATE: " . session_id();
        $newUserInfo = $this->getPost();
        $userId = $this->model->create($newUserInfo);
        $_SESSION["userId"] = $userId;
        $this->read($userId);
    }

    //GET
    function read($userId){
        $user = $this->model->read($userId);
        //TODO output the user array as JSON
        return $userId;
    }

    public function update(){}

    //DELETE
    function delete(){
        echo "SESSION ID - DELETE: " . session_id();
        if(!isset($_SESSION["userId"])){
            echo "userID wasn't set";
            $this->redirect("/login");
        }
        else if (isset($_DELETE["submit"]) || 1){
            echo "deleting user now";
            $userId = $_SESSION["userId"];
            $this->model->delete($userId);
            $this->redirect("/logout");
        }
        else{
            $this->redirect("/");
        }
    }
}