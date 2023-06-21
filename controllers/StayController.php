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
        if ($data && $data["animal_id"] && $data["reservation_date"] && $data["start_date"] && $data["end_date"]) {
    
            $reservation_date = $data["reservation_date"];
            $start_date = $data["start_date"];
            $end_date = $data["end_date"];
            $animal_id = $data["animal_id"];
    
            $stay = new Stay(false, $reservation_date, $start_date, $end_date, $animal_id);
    
            $stay->save();
            return include '../views/stays/store.php';
        }
    }

    public function update($id, $data) {
        $stay = Stay::find($id);
        if ($stay) {
            $stay->reservation_date = isset($data["reservation_date"]) ? $data["reservation_date"] : $stay->reservation_date;
            $stay->start_date = isset($data["start_date"]) ? $data["start_date"] : $stay->start_date;
            $stay->end_date = isset($data["end_date"]) ? $data["end_date"] : $stay->end_date;
            $stay->animal_id = isset($data["animal_id"]) ? $data["animal_id"] : $stay->animal_id;
    
            $stay->save();
            return include '../views/stays/update.php';
        }
        return include '../views/stays/notfound.php';
    }

    public function destroy($id) {
        $stay = Stay::find($id);
        if ($stay) {
            $stay->delete();
            return include '../views/stays/delete.php';
        }
        return include '../views/stays/notfound.php';
    }
}
