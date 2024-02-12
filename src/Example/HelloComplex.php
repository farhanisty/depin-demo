<?php

namespace Farhannivta\Depin\Example;

class HelloComplex implements Hello
{
  public function sayHello(): string
  {
    return "hello but its more complicated";
  }
}
