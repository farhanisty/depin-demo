<?php

namespace Farhannivta\Depin;

class ContainerItem
{
  public string $interface;
  public string $impl;
  public $implObject = null;
  private bool $singletone = false;
  private bool $manualResolve = false;
  private $resolve;

  public function isSingletone(): bool
  {
    return $this->singletone;
  }

  public function setSingletone(): void
  {
    $this->singletone = True;
  }

  public function isManualResolve(): bool
  {
    return $this->manualResolve;
  }

  public function setManualResolve(): void
  {
    $this->manualResolve = true;
  }

  public function setResolve(callable $resolve): void
  {
    $this->setManualResolve();
    $this->resolve = $resolve;
  }

  public function getResolve(): callable
  {
    return $this->resolve;
  }
}
