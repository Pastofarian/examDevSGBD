<?php

class AnimalController
{
    public function index()
    {
        $animals = Animal::all();
        $owners = [];
        $stays = Stay::all();

        $animalsWithStays = [];
        foreach ($stays as $stay) {
            $animalsWithStays[] = $stay->animal_id;
        }

        foreach ($animals as $animal) {
            $owners[$animal->id] = Owner::find($animal->owner_id); // stock chaque objet Owner dans le tableau, en utilisant l'ID de l'animal comme clé
        }
        include '../views/animals/list.php';
    }

    public function show($id)
    {
        $animal = Animal::find($id);
        if ($animal) {
            $owner = Owner::find($animal->owner_id);
            return include '../views/animals/one.php';
        }
        return include '../views/animals/notfound.php';
    }

    public function create()
    {
        $owners = Owner::all();
        return include '../views/animals/create.php';
    }

    public function edit($id)
    {
        $owners = Owner::all();
        $animal = Animal::find($id);
        if ($animal) {
            return include '../views/animals/edit.php';
        }
        return include '../views/animals/notfound.php';
    }

    public function store($data)
    {
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $data = $this->sanitizeInput($data);
        $errorMessage = $this->validateAnimalData($data);
        if ($errorMessage) {
            return include '../views/animals/dateError.php';
        }
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

    public function update($id, $data)
    {
        //var_dump($_POST);
        $data = $this->sanitizeInput($data);
        $errorMessage = $this->validateAnimalData($data);
        if ($errorMessage) {
            return include '../views/animals/dateError.php';
        }
        $animal = Animal::find($id);
        if ($animal) {
            $animal->name = isset($data["name"]) ? $data["name"] : $animal->name;
            $animal->sex = isset($data["sex"]) ? $data["sex"] : $animal->sex;
            $animal->sterilized = isset($data["sterilized"]) ? $data["sterilized"] : $animal->sterilized;
            $animal->birth_date = isset($data["birth_date"]) ? $data["birth_date"] : $animal->birth_date;
            $animal->chip_id = isset($data["chip_id"]) ? $data["chip_id"] : $animal->chip_id;
            $animal->owner_id = isset($data["owner_id"]) ? $data["owner_id"] : $animal->owner_id;
            $animal->save();
            return include '../views/animals/update.php';
        }
        return include '../views/animals/notfound.php';
    }

    public function destroy($id)
    {
        $animal = Animal::find($id);
        if ($animal) {
            $animal->delete();
            return include '../views/animals/delete.php';
        }
        return include '../views/animals/notfound.php';
    }

    private function validateAnimalData($data)
    {
        $today = new DateTime();
        $thirtyYearsAgo = new DateTime('-30 years');

        if (!isset($data['birth_date'])) {
            return 'Données manquantes. Veuillez vous assurer que la date de naissance est fournie.';
        }

        $birthDate = DateTime::createFromFormat('Y-m-d', $data['birth_date']);

        if ($birthDate > $today || $birthDate < $thirtyYearsAgo) {
            return 'La date de naissance doit être comprise entre aujourd\'hui et 30 ans.';
        }

        return "";
    }

    private function sanitizeInput($data)
    {
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            $sanitizedData[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $sanitizedData;
    }
}
