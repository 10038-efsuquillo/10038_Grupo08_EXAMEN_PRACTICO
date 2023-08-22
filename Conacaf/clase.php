<?php

class Continent {
    public $name;
    public $numCountries;

    public function __construct($name, $numCountries) {
        $this->name = $name;
        $this->numCountries = $numCountries;
    }
}

class Federacion {
    public $name;
    public $numCountries;

    public function __construct($name, $numCountries) {
        $this->name = $name;
        $this->numCountries = $numCountries;
    }
}

class Pais extends Federacion {
    public $typicalDish;
    public $currency;
    public $flag;
    public $provinces;

    public function __construct($name, $typicalDish, $currency, $flag, $provinces, $numCountries) {
        parent::__construct($name, $numCountries);
        $this->typicalDish = $typicalDish;
        $this->currency = $currency;
        $this->flag = $flag;
        $this->provinces = $provinces;
    }
}

class Provincias {
    public $name;
    public $numCities;
    public $cities;

    public function __construct($name, $numCities, $cities) {
        $this->name = $name;
        $this->numCities = $numCities;
        $this->cities = $cities;
    }
}

class Ciudad {
    public $name;
    public $postalCode;

    public function __construct($name, $postalCode) {
        $this->name = $name;
        $this->postalCode = $postalCode;
    }
}



?>
