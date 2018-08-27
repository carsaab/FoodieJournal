<?php

namespace TrainingProject\Controllers;

abstract class Controller{
    protected $view;
    protected $model;

    protected function getPost(){
        return $_POST;
    }

    protected function redirect($url) {
        header('Location: ' . $url);
        exit;
    }

    public function render($view, $params = null){
        if ($params){
            extract($params);
        }
        $view = "C:\PersonalProjects\TrainingProject\Views\\" . $view . ".html"; //TODO don't hardcode path, use constant
        include $view;
    }

}