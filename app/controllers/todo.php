<?php

class Todo extends Controller{
    public function index(){                          
        $this->view('templates/header');
        $this->view('todo/index');
        $this->view('templates/footer');
    }
}