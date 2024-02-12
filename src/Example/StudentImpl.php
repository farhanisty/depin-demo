<?php

namespace Farhannivta\Depin\Example;

use Farhannivta\Depin\Example\Laptop;

class StudentImpl implements Student
{
  private string $name;
  private ?Laptop $laptop = null;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function setLaptop(Laptop $laptop)
  {
    $this->laptop = $laptop;
  }
  
  public function getLaptop(): ?Laptop
  {
    return $this->laptop;
  }
}
