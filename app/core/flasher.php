<?php

class Flasher{
    public static function setFlash($type, $message, $action){
        $_SESSION['flash'] = [
            'action' => $action,
            'type' => $type,
            'message' => $message
        ];
    }

    public static function flash(){
        if(isset($_SESSION['flash'])){
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">';
            echo '<strong>' . $_SESSION['flash']['message'] . ' </strong>'.$_SESSION['flash']['action'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['flash']);
        }
    }
}