<?php

class Controller{
    
    public function view($path, $data = []){
        require_once '../app/views/' . $path . '.php';
    }

    public function load_model($model){

        if(file_exists("../app/models/" . strtolower($model) . ".php")){
            require_once "../app/models/" . strtolower($model) . ".php";
            return $mod = new $model();
        }
            
        return false;

    }

}