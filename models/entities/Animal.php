<?php

class Animal extends Entity {
    protected $id;
    protected $name;
    protected $sex;
    protected $sterilized;
    protected $birth_date;
    protected $chip_id;
    protected $owner_id;
    protected static $dao = "AnimalDAO";
    
    public function __construct ($id, $name, $sex, $sterilized, $birth_date, $chip_id, $owner_id) {
        $this->id = $id;
        $this->name = $name;
        $this->sex = $sex;
        $this->sterilized = $sterilized;
        $this->birth_date = $birth_date;
        $this->chip_id = $chip_id;
        $this->owner_id = $owner_id;
    }

public static function findAllByOwnerId($ownerId) {
    $animalDao = new AnimalDAO();
    return $animalDao->fetchAllByOwnerId($ownerId);
}

}
