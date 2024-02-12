<?php

namespace Farhannivta\Depin\Example;

use Farhannivta\Depin\Example\Hello;
use Farhannivta\Depin\Example\Math;

class PartyImpl implements Party
{
  private Hello $hello;
  
  public function __construct(Hello $hello)
  {
    $this->hello = $hello;
  }
  
  public function welcome(): string
  {
    return $this->hello->sayHello();
  }
}
