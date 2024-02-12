<?php

namespace Farhannivta\Depin\Example;

use Farhannivta\Depin\Example\Party;
use Farhannivta\Depin\Example\Math;

class Person
{
  private string $message;
  
  public function __construct(string $message)
  {
    $this->message = $message;
  }

  public function party()
  {
    echo $this->message;
  }
}
