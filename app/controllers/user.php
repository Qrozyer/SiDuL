<?php

class User extends Controller{
    public function signup(){        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $users = $this->load_model("users");
            if(isset($_POST['signup'])){                   
                if($users->signup($_POST)  > 0){
                    Flasher::setFlash('success', 'Sign Up New Account', 'Success');
                    // echo "<META HTTP-EQUIV='Refresh' Content='0; URL=" . BASEURL. "/user/login'>";
                    header("Location: " . BASEURL . "/user/login");
                    exit;
                }else{
                    $message = $_SESSION['error'];
                    Flasher::setFlash('danger', "$message", 'Failed! ');
                    header("Location: " . BASEURL . "/user/login#register");
                    exit;
                }        
            }
        }
        $this->view('templates/header');
        $this->view('user/signup');
        $this->view('templates/footer');
    }

    public function login(){        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $users = $this->load_model("users");            
            if(isset($_POST['login'])){
                if($users->login($_POST)  > 0){                    
                    // echo "<META HTTP-EQUIV='Refresh' Content='0; URL=" . BASEURL. "/home/index'>";
                    header("Location: " . BASEURL . "/home/index");
                    exit;
                }else{
                    $message = $_SESSION['error'];
                    Flasher::setFlash('danger', "$message", 'Failed! ');
                    header("Location: " . BASEURL . "/user/login");
                    exit;
                } 
            
            }
        }
        $this->view('templates/header');
        $this->view('user/login');
        $this->view('templates/footer');
    }

    public function logout(){      
        $this->load_model('users')->logout();
        header("Location: " . BASEURL . "/user/login");
    }
}