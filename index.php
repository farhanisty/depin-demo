<?php

function dd($obj) {
  echo "<pre>";var_dump($obj);die;
}

require_once(__DIR__ . "/vendor/autoload.php");

use Farhannivta\Depin\Depin;
use Farhannivta\Depin\Example\StudentImpl;
use Farhannivta\Depin\Example\Laptop;
use Farhannivta\Depin\Example\AsusLaptop;
use Farhannivta\Depin\Example\LaptopROG;

$depin = Depin::getInstance();

$depin->bindResolve(Laptop::class, function(Depin $depin) {
  return new LaptopROG();
});

$farhanStudent = new StudentImpl("Farhan");
$farhanStudent->setLaptop($depin->call(Laptop::class));

echo $farhanStudent->getLaptop()->getBrand();


$arielStudent = new StudentImpl("Ariel");
$arielStudent->setLaptop($depin->call(Laptop::class));

echo $arielStudent->getLaptop()->getBrand();

echo ($farhanStudent->getLaptop() === $arielStudent->getLaptop()) ? "Sama" : "Beda";
