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


}