<?php

class Owner extends Entity {
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $birth_date;
    protected $email;
    protected $phone;
    protected static $dao = "OwnerDAO";
    
    public function __construct ($id, $first_name, $last_name, $birth_date, $email, $phone) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birth_date = $birth_date;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function animals() {
        // Pour avoir le nom du/des animaux dans les vues
        return Animal::findAllByOwnerId($this->id);
    }
}
