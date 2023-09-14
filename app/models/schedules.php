<?php

class schedules {
    private $table = 'schedules';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function index(){  
        $query = "SELECT * FROM $this->table";
        $this->db->query($query);
        return $this->db->fetchAll();
    } 

    public function create($data){
        $schedule = $data['schedule'];
        $priority = $data['priority'];
        $date = $data['date'];
        $user_id = $data['user_id'];        
        $create = "INSERT INTO $this->table (schedule, priority, date, user_id) VALUES (:schedule,:priority,:date,:user_id)";
        $this->db->query($create);
        $this->db->bind(':schedule', $schedule);
        $this->db->bind(':priority', $priority);
        $this->db->bind(':date', $date);
        $this->db->bind(':user_id', $user_id);        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data){
        $id = $data['id'];
        $schedule = $data['schedule'];
        $priority = $data['priority'];
        $date = $data['date'];
        $user_id = $data['user_id'];        
        $update = "UPDATE $this->table SET schedule = :schedule, priority = :priority, date = :date, user_id = :user_id WHERE id = :id";
        $this->db->query($update);
        $this->db->bind(':schedule', $schedule);
        $this->db->bind(':priority', $priority);
        $this->db->bind(':date', $date);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id){
        $delete = "DELETE FROM $this->table WHERE schedule_id = :id";
        $this->db->query($delete);
        $this->db->bind(':id', $id);
        $this->db->execute();
        
        return $this->db->rowCount();
    }
}