<?php

class StayController {
    public function index() {
        $stays = Stay::all();
        include '../views/stays/list.php';
    }

    public function show($id) {
        $stay = Stay::find($id);
        if ($stay) {
            return include '../views/stays/one.php';
        }
        return include '../views/stays/notfound.php';
    }

    public function create() {
        return include '../views/stays/create.php';
    }

    public function edit($id) {
        $stay = Stay::find($id);
        if ($stay) {
            return include '../views/stays/edit.php';
        }
        return include '../views/stays/notfound.php';
    }

    public function store($data) {
        //var_dump($_POST);
        $validationResult = $this->validateStayData($data);
        if ($data && $data["animal_id"] && $data["reservation_date"] && $data["start_date"] && $data["end_date"] && $validationResult === "") {
    
            $reservation_date = $data["reservation_date"];
            $start_date = $data["start_date"];
            $end_date = $data["end_date"];
            $animal_id = $data["animal_id"];
    
            $stay = new Stay(false, $reservation_date, $start_date, $end_date, $animal_id);
    
            $stay->save();
            return include '../views/stays/store.php';
        } else {
            $errorMessage = $validationResult;
            return include '../views/stays/dateError.php';
        }
    }

    public function update($id, $data) {
        $validationResult = $this->validateStayData($data);
        $stay = Stay::find($id);
        if ($stay && $validationResult === "") {
            $stay->reservation_date = isset($data["reservation_date"]) ? $data["reservation_date"] : $stay->reservation_date;
            $stay->start_date = isset($data["start_date"]) ? $data["start_date"] : $stay->start_date;
            $stay->end_date = isset($data["end_date"]) ? $data["end_date"] : $stay->end_date;
            $stay->animal_id = isset($data["animal_id"]) ? $data["animal_id"] : $stay->animal_id;
    
            $stay->save();
            return include '../views/stays/update.php';
        } else {
            $errorMessage = $validationResult;
            return include '../views/stays/dateError.php';
        }
    }

    public function destroy($id) {
        $stay = Stay::find($id);
        if ($stay) {
            $stay->delete();
            return include '../views/stays/delete.php';
        }
        return include '../views/stays/notfound.php';
    }

    private function validateStayData($data) {
        $today = new DateTime();
        $twoYearsFromNow = new DateTime('+2 years');
        
        if(!isset($data['reservation_date']) || !isset($data['start_date']) || !isset($data['end_date'])){
            return 'Missing data. Please ensure reservation_date, start_date, and end_date are provided.';
        }
    
        $reservationDate = DateTime::createFromFormat('Y-m-d', $data['reservation_date']);
        $startDate = DateTime::createFromFormat('Y-m-d', $data['start_date']);
        $endDate = DateTime::createFromFormat('Y-m-d', $data['end_date']);

        if ($endDate < $startDate) {
            return 'La date de fin doit être après la date de début.';
        }
    
        if ($reservationDate > $startDate) {
            return 'La date de réservation doit être avant ou le même jour que la date de début.';
        }
    
        if ($reservationDate < $today || $reservationDate > $twoYearsFromNow) {
            return 'La date de réservation doit être entre aujourd\'hui et deux ans à partir de maintenant.';
        }
    
        $interval = $startDate->diff($endDate);
        if ($interval->days < 1 || $interval->days > 180) {
            return 'La date de début doit être au moins un jour et pas plus de six mois avant la date de fin.';
        }
    
        return "";
    }
    
}
