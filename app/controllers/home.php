<?php

class Home extends Controller{
    public function index(){        
        $user = $this->load_model('users')->check_login();        
        if(!$user){
            header("Location: " . BASEURL . "/user/login");
            exit;
        }
        $_SESSION['user'] = $user;
        $data= $this->load_model('schedules')->index();
        $this->view('templates/header');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}