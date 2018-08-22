<?php

namespace TrainingProject\Controllers;

class Controller{
    public $view;
    public $model;

    protected function redirect($url) {
        header('Location: ' . $url);
        exit;
    }


}