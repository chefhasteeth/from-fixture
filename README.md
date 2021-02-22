# What is FromFixture?
*FromFixture* is a trait that allows your Laravel 8+ factories to seed the database and create models from JSON files.

## What are fixtures?
An exerpt from the [PHPUnit 9.5 documentation](https://phpunit.readthedocs.io/en/9.5/fixtures.html):

> One of the most time-consuming parts of writing tests is writing the code to set the world up in a known state and then return it to its original state when the test is complete. This known state is called the fixture of the test.

In other words, fixtures are just snapshots of data you want to load before a test to ensure the inputs and outputs are consistent.

## How do I use it?
Use the trait in your factory classes:

```php
<?php

namespace Database\Factories;

use Chefhasteeth\FromFixture\FromFixture;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    use FromFixture;

    // ...
}
```

Then, in your seeder, you can call the `fromFixture()` method:

```php
User::factory()->fromFixture('users.json');
```

The `fromFixture()` method returns a collection of models, so if you need to process them in some way, you can use any collection method afterward:

```php
User::factory()->fromFactory('users.json')->each(function ($user) {
    $user->doSomethingWithTheModel();
});
```
