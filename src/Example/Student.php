<?php

namespace Farhannivta\Depin\Example;

use Farhannivta\Depin\Example\Laptop;

interface Student
{
  public function setLaptop(Laptop $laptop);
  
  public function getLaptop(): ?Laptop;
}
