<?php

class Stay extends Entity {
    protected $id;
    protected $reservation_date;
    protected $start_date;
    protected $end_date;
    protected $animal_id;
    protected static $dao = "StayDAO";
    
    public function __construct ($id, $reservation_date, $start_date, $end_date, $animal_id) {
        $this->id = $id;
        $this->reservation_date = $reservation_date;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->animal_id = $animal_id;
    }

    public function animal() {
        return $this->belongsTo('Animal', 'animal_id');
    }
}
