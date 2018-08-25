### Dependency injection container explained:

I have had a hard time to understand, how does the _dependency injection container_ design pattern work, but I think, that with the help of
Peto Bodnar (https://github.com/prog) I have found my way around this pattern. Although the principle of the dependency injection was clear
to me, it took me a while to address the problem of creating too many dependencies before I could create my desired object. 

Imagine, we have a Car class, which has many dependencies, so in order to create a new instance of the Car class, you first need to create all of those:

```php
$tiresFactory = new TiresFactory();
$tires = $tiresFactory->create('Michelin', 17);

$engineFactory = new EngineFactory();
$engine = $engineFactory->create();

$lightsFactory = new LightsFactory();
$lights = $lightsFactory->create();

// Here you can have many other dependencies

// Now, I can finally create my desired Car object:
$carFactory = new CarFactory();
$audiCar = $carFactory->create('Audi', 'blue', $engine, $tires, $lights);
```

With the help of dependency injection container, you can however do this: 

```php
$carFactory = $container->get('CarFactory');
$audiCar = $carFactory->create(CarFactory::CAR_AUDI);
```

Here you can see the container config file (I am using the php-di.org implementation): 

```php
return array(

    'CarFactory' => function(ContainerInterface $c) {
        $engineFactory = $c->get('EngineFactory');
        $tiresFactory = $c->get('TiresFactory');
        $lightsFactory = $c->get('LightsFactory');
        return new CarFactory($engineFactory, $tiresFactory, $lightsFactory);
    },

    'TiresFactory' => function(ContainerInterface $c) {
        return new TiresFactory();
    },

    'EngineFactory' => function(ContainerInterface $c) {
        return new EngineFactory();
    },

    'LightsFactory' => function(ContainerInterface $c) {
        return new LightsFactory();
    }

);
```

As you can see from the code above, what we do in the container is, we create a 'service factory' and we return that factory from the container. Then, in your client code, you can
create an instance of the object by calling the 'create()' factory method. In case the 'service' (factory) depends on an other service, you inject that service into the other one. 

Some important things to notice:

- Always return a factory from the container
- You should inject only other factories into a factory as a dependency
- Distinguish between 'product dependencies' (the result of the create() factory method) and 'service dependencies'. Service dependencies should be injected in the container, while 'product dependencies'
  should be injected directly in the constructor of the desired object you want to create.
  
Notice, that I use 3 factories: 'engineFactory', 'tiresFactory', 'lightsFactory' ... Since those are 'services', I create them in the service container and I pass those services into the CarFactory: 

```php
return [
    'CarFactory' => function(ContainerInterface $c) {
        $engineFactory = $c->get('EngineFactory');
        $tiresFactory = $c->get('TiresFactory');
        $lightsFactory = $c->get('LightsFactory');
        return new CarFactory($engineFactory, $tiresFactory, $lightsFactory);
    }
]
```

In the carFactory, I can then create a Car object and I can leverage the other factories (services) like so: 
  
```php
$engine = $this->engineFactory->create();
$tires = $this->tiresFactory->create('Goodyear', 17);
$lights = $this->lightsFactory->create();
return new Car('Audi', 'blue', $engine, $tires, $lights);
```
  
Check the project source code https://github.com/durino13/dic for more info.

