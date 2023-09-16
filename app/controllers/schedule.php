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

    public function edit(){        
        echo json_encode($this->load_model('schedules')->edit($_POST['id']));
    }

    public function update(){                          
        if($this->load_model('schedules')->update($_POST) > 0){
            Flasher::setFlash('success', 'Update Schedule', 'Success');
            header("Location: " . BASEURL . "/home/index");
            exit;
        }else{
            Flasher::setFlash('danger', 'Update Schedule', 'Failed');
            header("Location: " . BASEURL . "/home/index");
            exit;
        }
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