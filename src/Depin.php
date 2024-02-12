<?php

namespace Farhannivta\Depin;

use Farhannivta\Depin\Container;
use Farhannivta\Depin\ContainerItem;

class Depin
{
  private Container $container;
  private static ?self $instance = null;
  
  public function __construct(Container $container)
  {
    $this->container = $container;
  }

  public static function getInstance(): self
  {
    if(!self::$instance) {
      self::$instance = new Depin(new Container());
    }

    return self::$instance;
  }

  public function bind(string $interface, string $implementation)
  {
    $containerItem = new ContainerItem();
    $containerItem->interface = $interface;
    $containerItem->implementation = $implementation;
    
    $this->container->registerContainerItem($containerItem);
    
    return $containerItem;
  }
  
  public function bindResolve(string $interface, callable $resolve)
  {
    $reflectionImpl = $this->isChildOfInterface($interface, $resolve);
    
    $containerItem = new ContainerItem();
    $containerItem->interface = $interface;
    $containerItem->implementation = $reflectionImpl->getName();
    $containerItem->setResolve($resolve);

    $this->container->registerContainerItem($containerItem);

    return $containerItem;
  }
  
  public function call(string $interface)
  {
    $containerItem = $this->container->getContainerItem($interface);
    
    if(!$containerItem) {
      throw new \Exception($interface . " is not registred");
    }

    if(!$containerItem->isSingletone()) {
      if($containerItem->isManualResolve()) {
        return $this->buildFromResolve($containerItem->getResolve());
      }
      
      return $this->build($containerItem->implementation);
    }

    if($containerItem->implObject) {
      return $containerItem->implObject;
    }
    
    if(!$containerItem->isManualResolve()) {
      $containerItem->implObject = $this->build($containerItem->implementation);
      return $containerItem->implObject;
    }

    $containerItem->implObject = $this->buildFromResolve($containerItem->getResolve());
    
    return $containerItem->implObject;
  }

  public function build(string $implementation)
  {
    $implReflection = new \ReflectionClass($implementation);
    $implConstructor = $implReflection->getConstructor();

    if(!$implConstructor) {
      return new $implementation;
    }

    $implDependency = [];

    foreach($implConstructor->getParameters() as $item)
    {
      $implDependency[] = $this->call($item->getType()->getName());
    }
    
    return $implReflection->newInstanceArgs($implDependency);
  }

  private function buildFromResolve($resolve)
  {
    return call_user_func_array($resolve, [$this]);
  }

  private function isChildOfInterface(string $interface, callable $resolve): ?\ReflectionClass
  {
    $impl = $this->buildFromResolve($resolve);
    $reflectionImpl = new \ReflectionClass($impl);
    $parents = $reflectionImpl->getInterfaceNames();
    
    if(!in_array($interface, $parents) && $reflectionImpl->getName() != $interface) {
      throw new \Exception($reflectionImpl->getName() . " is not child class of " . $interface);
    }

    return $reflectionImpl;
  }
}
