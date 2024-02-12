<?php

namespace Farhannivta\Depin\Example;

class MathImpl implements Math
{
  private $result = 0;
    
  public function add(int $number)
  {
    $this->result += $number;
  }

  public function result(): int
  {
    return $this->result;
  }
}
