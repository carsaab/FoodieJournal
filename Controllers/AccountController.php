<?php
namespace TrainingProject\Controllers;
use \TrainingProject\Models;
use \TrainingProject\DataAccess;

class AccountController extends Controller{

    function __construct() {
        $this->databaseGateway = new DataAccess\UsersDBGateway();
    }

    //GET
    function manage(){
        /*TODO get the username variable from the session
        * extract it into the manange account view */
        $username = $_SESSION["username"];
        $params = ["username" => $username];
        $this->render("account", $params);
    }



    //POST
    function create(){
        echo "SESSION ID - CREATE: " . session_id();
        $newUserInfo = $this->getPost();
        $_SESSION["username"] = $newUserInfo["username"];
        $userId = $this->databaseGateway->create($newUserInfo);
        $_SESSION["userId"] = $userId;
        $this->read($userId);
    }

    //GET
    function read($userId){
        $user = $this->databaseGateway->read($userId);
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
        else if (isset($_POST["submit"]) || 1){
            echo "deleting user now";
            $userId = $_SESSION["userId"];
            $this->databaseGateway->delete($userId);
            $this->redirect("/logout");
        }
        else{
            $this->redirect("/");
        }
    }
}