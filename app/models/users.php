<?php

class users{
    private $error = "";
    private $db;    

    public function __construct(){
        $this->db = new Database;
    }

    public function signup($data){
        $username = trim(strtolower(stripslashes($data["username"])));
        
        if(empty($username) || filter_var($username,FILTER_VALIDATE_INT)){
            $this->error .= "Please enter a valid username! <br>";
        }
        
        $email    = trim($data["email"]);
        
        if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $this->error .= "Please enter a valid email! <br>";
        }

        $query    = "SELECT * FROM users WHERE email = '$email'";
        $this->db->query($query);        
        $user = $this->db->fetchAll();
                
        if($user["email"] == $email){
            $this->error .= "This email already registered! <br>";
        }

        $password  = trim($data["password"]);
        $password2 = trim($data["password2"]);

        if(strlen($password) < 8){
            $this->error .= "Password must be at least 8 characters! <br>";
        }

        if($password !== $password2){
            $this->error .= "Passwords do not match! <br>";        
        }

        $_SESSION['url_address'] = $this->get_random_string_max(60);
        $url_address = $_SESSION['url_address'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        if($this->error == ""){            
            $signUp = "INSERT INTO users (username, email, password, url_address) VALUES (:username, :email, :password, :url_address)";
            $this->db->query($signUp);    
            $this->db->bind(':username', $username);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $password);
            $this->db->bind(':url_address', $url_address);                    
            $this->db->execute();            
        }        

        $_SESSION['error'] = $this->error;

        return $this->db->rowCount();
    }

    public function cookie($id){
        $query = "SELECT * FROM users WHERE user_id = '$id'";
        $this->db->query($query);
        return $this->db->fetch();
    }

    public function login($data){
        $email = $data["email"];

        if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $this->error .= "Please enter a valid email! <br>";
        }

        $password = $data["password"];

        if($this->error == ""){   

        $query = "SELECT * FROM users WHERE email = '$email'";
        $this->db->query($query);
        $user = $this->db->fetch();
        if($user["email"] == $email){
            if(password_verify($password, $user["password"])){
                $_SESSION["user_url"] = $user['url_address'];
                if(isset($data["remember"])){
                    setcookie('id', $user['user_id'], time() +60);
                    setcookie('key', hash('sha256', $user['email']), time() +60);
                }                
            }else{
                $this->error .= "Password is wrong! <br>";
            }
        }else{ 
            $this->error .= "Email is wrong! <br>";
        }

        }

        $_SESSION['error'] = $this->error;

        return $this->db->rowCount();
    }

    public function get_random_string_max($length){
        $array = [0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $text = "";
        $length = rand(4,$length);
        for($i=0;$i<$length;$i++){
            $random = rand(0,61);
            $text .= $array[$random];
        }
        return $text;
    }

    public function check_login(){
        if(isset($_SESSION['user_url'])){
            $user_url = $_SESSION['user_url'];
            $query = "SELECT * FROM users WHERE url_address = '$user_url'";
            $this->db->query($query);            
            $user = $this->db->fetch();
            if($user_url == $user['url_address']){
                return $user;
            }
        }

        return false;

    }

    public function logout(){
        if(isset($_SESSION['user_url'])){
            unset($_SESSION['user_url']);
            $_SESSION = [];              
            session_unset();      
            session_destroy();
        }       
    }
}