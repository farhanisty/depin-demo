<?php

namespace Farhannivta\Depin\Providers;

use Farhannivta\Depin\Depin;

abstract class DependencyProvider
{
  protected Depin $depin;
  
  public function prepare()
  {
    $this->depin = Depin::getInstance();
  }
  
  abstract public function provide();
}
