<?php

namespace Farhannivta\Depin\Example;

class HelloImpl implements Hello
{
  public function sayHello(): string
  {
    return "hello from impl";
  }
}
