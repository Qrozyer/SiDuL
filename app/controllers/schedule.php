<?php

class Schedule extends Controller{
    public function create(){                 
        if($this->load_model('schedules')->create($_POST) > 0){
            Flasher::setFlash('success', 'Add Schedule', 'Success');
            header("Location: " . BASEURL . "/home/index");
            exit;
        }else{
            Flasher::setFlash('danger', 'Add Schedule', 'Failed');
            header("Location: " . BASEURL . "/home/index");
            exit;
        }
    }

    public function update(){                          
        $this->view('templates/header');
        $this->view('schedule/update');
        $this->view('templates/footer');
    }

    public function delete($id){                          
        if($this->load_model('schedules')->delete($id) > 0){
            Flasher::setFlash('success', 'Delete Schedule', 'Success');
            header("Location: " . BASEURL . "/home/index");
            exit;
        }else{
            Flasher::setFlash('danger', 'Delete Schedule', 'Failed');
            header("Location: " . BASEURL . "/home/index");
            exit;
        }
    }    
}