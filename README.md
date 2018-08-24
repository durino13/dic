### Dependency injection container explained:

I have had a hard time to understand, how does the _dependency injection container_ design pattern works, but I think, that with the help of
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

