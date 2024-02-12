<?php

namespace Farhannivta\Depin\Providers;

use Farhannivta\Depin\Example\Math;
use Farhannivta\Depin\Example\MathImpl;

class MathProvider extends DependencyProvider
{
  public function provide()
  {
    $this->depin->bind(Math::class, MathImpl::class);
  }
}
