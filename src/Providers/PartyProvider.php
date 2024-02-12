<?php

namespace Farhannivta\Depin\Providers;

use Farhannivta\Depin\Example\Party;
use Farhannivta\Depin\Example\PartyImpl;
use Farhannivta\Depin\Example\HelloComplex;

class PartyProvider extends DependencyProvider
{
  public function provide()
  {
    $this->depin->bind(Party::class, PartyImpl::class);
  }
}
