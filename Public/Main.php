<?php
use \TrainingProject\Controllers\Login;
use \TrainingProject\Routing\Router;

require_once 'vendor/aura-autoload/autoload.php';
$loader=new \Aura\Autoload\Loader();
$loader->register();
$loader->addPrefix('\TrainingProject', 'C:\PersonalProjects\TrainingProject');

//TODO make switch statement that instantiates the proper controller class, calls the method, based on the URL
//$module = "login";
//if($module == 'login'){
////    require_once("Controllers\Login.php");
//    $controller = new Login();
//} else if ($module == 'journal'){
//    // $controller = new Journal();
//}

// Instantiate Router
$routes = include 'C:/PersonalProjects/TrainingProject/Routing/' . 'routes.php';

echo $_SERVER['PATH_INFO'] . "     ";
echo $_SERVER['REQUEST_METHOD'];
$router = new Router($routes);
$router->resolve($_SERVER['PATH_INFO']);

// Take URI and split into its components localhost/controller/memberFunctionToCall
// Instantiate Controller and call that Member Function
?>