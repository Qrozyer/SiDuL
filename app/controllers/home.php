<?php

class Home extends Controller{
    public function index(){          
        $data= $this->load_model('schedules')->index();
        $this->view('templates/header');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}