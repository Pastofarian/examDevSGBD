<?php

class AnimalController {
    public function index () {
        $animals = Animal::all();
        include '../views/animals/list.php';
    }

    public function show ($id) {
        $animal = Animal::find($id);
        if ($animal) {
            return include '../views/animals/one.php'; 
        }
        return include '../views/animals/notfound.php';
    }

    public function create () {
        return include '../views/animals/create.php';
    }

    public function edit ($id) {
        $animal = Animal::find($id);
        if ($animal) {
            return include '../views/animals/edit.php';
        }
        return include '../views/animals/notfound.php';
    }

    public function store ($data) {
        //var_dump($_POST);
        if ($data && $data["name"]) {
    
            $sex = array_key_exists('sex', $data) && $data['sex'] ? $data['sex'] : 'M';
            $sterilized = array_key_exists('sterilized', $data) && $data['sterilized'] ? $data['sterilized'] : '0';
            
            if (array_key_exists('birth_date', $data) && $data['birth_date']) {

                $date = DateTime::createFromFormat('Y-m-d', $data['birth_date']);
                if ($date === false) {
                    $birth_date = '2011-07-07';
                } else {
                    $birth_date = $date->format('Y-m-d');
                }
            } else {
                $birth_date = '2011-07-07';
            }
            //var_dump($data);
    
            $chip_id = array_key_exists('chip_id', $data) && $data['chip_id'] ? $data['chip_id'] : '0000000';
            $owner_id = array_key_exists('owner_id', $data) && $data['owner_id'] ? $data['owner_id'] : '1';
    
            $animal = new Animal(false, $data["name"], $sex, $sterilized, $birth_date, $chip_id, $owner_id);
    
            $animal->save();
            return include '../views/animals/store.php';
        }
    }
    

    public function update ($id, $data) {
        //var_dump($_POST);
        $animal = Animal::find($id);
        if ($animal) {
            $animal->name = isset($data["name"]) ? $data["name"] : $animal->name;
            $animal->sex = isset($data["sex"]) ? $data["sex"] : $animal->sex;
            $animal->sterilized = isset($data["sterilized"]) ? $data["sterilized"] : $animal->sterilized;
            $animal->birth_date = isset($data["birth_date"]) ? $data["birth_date"] : $animal->birth_date;
            $animal->chip_id = isset($data["chip_id"]) ? $data["chip_id"] : $animal->chip_id;
    
            $animal->save();
            return include '../views/animals/update.php';
        }
        return include '../views/animals/notfound.php';
    }
    

    public function destroy ($id) {
        $animal = Animal::find($id);
        if ($animal) {
            $animal->delete();
            return include '../views/animals/delete.php';
        }
        return include '../views/animals/notfound.php';
    }
}
