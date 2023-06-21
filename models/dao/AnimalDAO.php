<?php

class AnimalDAO extends DAO {

    public function __construct () {
        parent::__construct("animals");
    }
    
    public function store ($animal) {
        $statement = $this->db->prepare("INSERT INTO animals (name, sex, sterilized, birth_date, chip_id, owner_id) VALUES (?, ?, ?, ?, ?, ?)");
        return parent::insert($statement, [$animal->name, $animal->sex, $animal->sterilized, $animal->birth_date, $animal->chip_id, $animal->owner_id], $animal);
    }
    
    public function update($animal) {
        $statement = $this->db->prepare("UPDATE animals SET name = ?, sex = ?, sterilized = ?, birth_date = ?, chip_id = ?, owner_id = ? WHERE id = ?");
        return parent::insert($statement, [$animal->name, $animal->sex, $animal->sterilized, $animal->birth_date, $animal->chip_id, $animal->owner_id, $animal->id], $animal);
    }
    
    public function create ($data) {
        if (empty($data["id"])) {
            return false;
        }
        return new Animal(
            $data["id"] ?? false,
            $data["name"] ?? false,
            $data["sex"] ?? false,
            $data["sterilized"] ?? false,
            $data["birth_date"] ?? false,
            $data["chip_id"] ?? false,
            $data["owner_id"] ?? false
        );
    }   
}
