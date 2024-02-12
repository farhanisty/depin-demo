<?php

namespace Farhannivta\Depin\Providers;

use Farhannivta\Depin\Example\Hello;
use Farhannivta\Depin\Example\HelloComplex;
use Farhannivta\Depin\Example\HelloImpl;

class HelloProvider extends DependencyProvider
{
  public function provide()
  {
    $this->depin->bind(Hello::class, HelloComplex::class);
  }
}
