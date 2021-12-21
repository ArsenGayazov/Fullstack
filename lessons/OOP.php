<?php

class Car {

    protected $brand;
    protected $model;
    protected $year;
    protected $mileage;
    private $noAcces;

    public function __construct($b, $m, $y, $mileage = 0) {//свойства класса
        $this->brand = $b;
        $this->model = $m;
        $this->year = $y;
        $this->mileage = $mileage;
        $this->noAcces = true;
    }

    public function drive () {//метод класса
        echo "$this->noAcces $this->brand $this->model ($this->year, $this->mileage) driving<br>";
    }

    public function addMileage ($mileage) {
        $error = false;
        if ($mileage > 0) {
        $this->mileage += $mileage;
        } else {
            $error = true;
        }
        return [
            'error' => $error,
            'mileage' => $this->mileage,
        ];
    }

    private function showNoAcces () {
        echo $this->noAcces;
    }

}

class ElectroCar extends Car {

    public $elecrtoCar;

    public function __construct ($b, $m, $y, $mileage = 0) {
        $this->electroCar = true;
        parent::__construct ($b, $m, $y, $mileage = 0);
    }

    public function drive () {//метод класса
        echo "Electrocar $this->brand $this->model ($this->year, $this->mileage) driving<br>";
    }

    public function parentDrive () {
        parent::drive();
    }
}

$audi = new Car('Audi', 'Q5', 2021);
$vesta = new Car('Lada', 'Vesta', 2020, 15000);

//echo $vesta->year; - защищено модификатором "protected"

$audi->drive();
$vesta->drive();

$currentAudiMileage = $audi->addMileage(2000);
echo $currentAudiMileage['mileage'] . '<br>';

$res = $vesta->addMileage(-10000);
if ($res['error']) {
    echo 'Не удалось увеличить пробег <br>';
} else {
    echo "Пробег увеличен. Текущий пробег: {$res['mileage']} <br>";
}

$audi->drive();
$vesta->drive();

$res = $vesta->addMileage(1000);
if ($res['error']) {
    echo 'Не удалось увеличить пробег <br>';
} else {
    echo "Пробег увеличен. Текущий пробег: {$res['mileage']} <br>";
}

$audi->drive();
$vesta->drive();

$tesla = new ElectroCar('Tesla', 'Model S', 2021);
$tesla->drive();
$tesla->parentDrive();
// $tesla->showNoAcces();