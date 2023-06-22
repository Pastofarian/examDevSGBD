<?php

class OwnerDAO extends DAO {

    public function __construct () 
    {
        parent::__construct("owners");
    }
    
    public function store ($owner) 
    {
        $statement = $this->db->prepare("INSERT INTO owners (first_name, last_name, birth_date, email, phone) VALUES (?, ?, ?, ?, ?)");
        return parent::insert($statement, [$owner->first_name, $owner->last_name, $owner->birth_date, $owner->email, $owner->phone], $owner);
    }
    
    public function update($owner) 
    {
        $statement = $this->db->prepare("UPDATE owners SET first_name = ?, last_name = ?, birth_date = ?, email = ?, phone = ? WHERE id = ?");
        return parent::insert($statement, [$owner->first_name, $owner->last_name, $owner->birth_date, $owner->email, $owner->phone, $owner->id], $owner);
    }
    
    public function create ($data) 
    {
        if (empty($data["id"])) {
            return false;
        }
        return new Owner(
            $data["id"] ?? false,
            $data["first_name"] ?? false,
            $data["last_name"] ?? false,
            $data["birth_date"] ?? false,
            $data["email"] ?? false,
            $data["phone"] ?? false
        );
    }
    
}
