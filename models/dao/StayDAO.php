<?php

class StayDAO extends DAO {

    public function __construct () 
    {
        parent::__construct("stays");
    }
    
    public function store ($stay) 
    {
        $statement = $this->db->prepare("INSERT INTO stays (reservation_date, start_date, end_date, animal_id) VALUES (?, ?, ?, ?)");
        return parent::insert($statement, [$stay->reservation_date, $stay->start_date, $stay->end_date, $stay->animal_id], $stay);
    }
    
    public function update($stay) 
    {
        $statement = $this->db->prepare("UPDATE stays SET reservation_date = ?, start_date = ?, end_date = ?, animal_id = ? WHERE id = ?");
        return parent::insert($statement, [$stay->reservation_date, $stay->start_date, $stay->end_date, $stay->animal_id, $stay->id], $stay);
    }
    
    public function create ($data) 
    {
        if (empty($data["id"])) {
            return false;
        }
        return new Stay(
            $data["id"] ?? false,
            $data["reservation_date"] ?? false,
            $data["start_date"] ?? false,
            $data["end_date"] ?? false,
            $data["animal_id"] ?? false
        );
    }
}
