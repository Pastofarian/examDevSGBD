<?php

class OwnerController
{
    public function index()
    {
        $owners = Owner::all();
        $animals = [];
        foreach ($owners as $owner) {
            $animalList = Animal::where('owner_id', $owner->id);
            if ($animalList !== false) {
                $animals[$owner->id] = $animalList;
            }
        }
        include '../views/owners/list.php';
    }

    public function show($id)
    {
        $owner = Owner::find($id);
        if ($owner === false) {
            include '../views/owners/notfound.php';
        } else {
            $animals = Animal::where('owner_id', $owner->id);
            include '../views/owners/one.php';
        }
    }

    public function create()
    {
        $owners = Owner::all();
        return include '../views/owners/create.php';
    }

    public function edit($id)
    {
        $owner = Owner::find($id);
        if ($owner) {
            return include '../views/owners/edit.php';
        }
        return include '../views/owners/notfound.php';
    }

    public function store($data)
    {
        //var_dump($_POST);

        $data = $this->sanitizeInput($data);
        $errorMessage = $this->validateOwnerData($data);
        if ($errorMessage) {
            return include '../views/owners/dateError.php';
        }
        if ($data && $data["first_name"] && $data["last_name"]) {
            $birth_date = array_key_exists('birth_date', $data) && $data['birth_date'] ? $data['birth_date'] : '1970-01-01';
            $email = array_key_exists('email', $data) && $data['email'] ? $data['email'] : '';
            $phone = array_key_exists('phone', $data) && $data['phone'] ? $data['phone'] : '';

            //var_dump($data);

            $owner = new Owner(false, $data["first_name"], $data["last_name"], $birth_date, $email, $phone);

            $owner->save();
            return include '../views/owners/store.php';
        }
    }

    public function update($id, $data)
    {
        $data = $this->sanitizeInput($data);
        $errorMessage = $this->validateOwnerData($data);
        if ($errorMessage) {
            return include '../views/owners/dateError.php';
        }
        //var_dump($_POST);
        $owner = Owner::find($id);
        if ($owner) {
            $owner->first_name = isset($data["first_name"]) ? $data["first_name"] : $owner->first_name;
            $owner->last_name = isset($data["last_name"]) ? $data["last_name"] : $owner->last_name;
            $owner->birth_date = isset($data["birth_date"]) ? $data["birth_date"] : $owner->birth_date;
            $owner->email = isset($data["email"]) ? $data["email"] : $owner->email;
            $owner->phone = isset($data["phone"]) ? $data["phone"] : $owner->phone;

            $owner->save();
            return include '../views/owners/update.php';
        }
        return include '../views/owners/notfound.php';
    }

    public function destroy($id)
    {
        $owner = Owner::find($id);
        if ($owner) {
            $owner->delete();
            return include '../views/owners/delete.php';
        }
        return include '../views/owners/notfound.php';
    }

    private function validateOwnerData($data)
    {
        $today = new DateTime();
        $thirtyYearsAgo = new DateTime('-100 years');

        if (!isset($data['birth_date'])) {
            return 'Données manquantes. Veuillez vous assurer que la date de naissance est fournie.';
        }

        $birthDate = DateTime::createFromFormat('Y-m-d', $data['birth_date']);

        if ($birthDate > $today || $birthDate < $thirtyYearsAgo) {
            return 'La date de naissance doit être comprise entre aujourd\'hui et 100 ans.';
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
