<?php

class Profile extends Controller{
    public function index(){                          
        $this->view('templates/header');
        $this->view('profile/index');
        $this->view('templates/footer');
    }

    public function create(){
        $this->view('templates/header');
        $this->view('profile/create');
        $this->view('templates/footer');
    }
    
    public function edit(){
        $this->view('templates/header');
        $this->view('profile/edit');
        $this->view('templates/footer');
    }
}