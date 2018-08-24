### Dependency injection container explained:

In order to create a new Car instance, you need to call a constructor:

```php
$car = new Car($brand, $color, Tires $tires)
```

We can easily supply 'brand' and the 'color' into the constructor, since those are simple strings, but we use a service (TiresFactory) in order to create new tires,
because it can be a more complex mechanism to create the tires. Now in order to create a new Audi car, we don't have to do this:

```php
$tiresFactory = new TiresFactory();
$tires = $tiresFactory->create('Michelin', 17);
// here you can have a long list of dependencies
$car = new Car('Audi', 'blue', $tires);
```

But we can simply do this:

```php
$carFactory = $container->get('CarFactory');
$audi = $carFactory->create(CarFactory::CAR_AUDI);
```

