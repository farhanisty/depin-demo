<?php

namespace Farhannivta\Depin;

class Container
{
  private array $interfaceDict = [];

  public function register(string $interface, string $implementation)
  {
    $containerItem = new ContainerItem();
    $containerItem->interface = $interface;
    $containerItem->implementation = $implementation;
    
    $this->registerContainerItem($containerItem);
  }

  public function registerContainerItem(ContainerItem $containerItem)
  {
    $this->interfaceDict[$containerItem->interface] = $containerItem;
  }

  public function getInterfaceDict(): array
  {
    return $this->interfaceDict;
  }

  public function getContainerItem(string $interface)
  {
    if(isset($this->interfaceDict[$interface])) {
      return $this->interfaceDict[$interface];
    }

    return null;
  }
}
