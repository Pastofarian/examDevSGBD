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
        if ($data && $data["name"]) {
            $animal = new Animal(false, $data["name"], $data["sex"], $data["sterilized"], $data["birth_date"], $data["chip_id"]);
            $animal->save();
            return include '../views/animals/store.php';
        }
    }

    public function update ($id, $data) {
        $animal = Animal::find($id);
        if ($animal) {
            $animal->name = $data["name"] ? $data["name"] : $animal->name;
            // Similar assignments for other attributes
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
