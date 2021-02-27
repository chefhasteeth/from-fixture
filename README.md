# What is FromFixture?
*FromFixture* is a trait that allows your Laravel 8+ factories to seed the database and create models from JSON files.

## What are fixtures?
An exerpt from the [PHPUnit 9.5 documentation](https://phpunit.readthedocs.io/en/9.5/fixtures.html):

> One of the most time-consuming parts of writing tests is writing the code to set the world up in a known state and then return it to its original state when the test is complete. This known state is called the fixture of the test.

In other words, fixtures are just snapshots of data you want to load before a test to ensure the inputs and outputs are consistent.

&nbsp;

## Installation

```bash
composer require chefhasteeth/from-fixture
```

&nbsp;

## Basic Usage
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

If you omit the filename from the `fromFactory()` method, it will guess the name of the file from the model being used. For example, a model named **UserSetting** will be transformed into `user-settings.json`. 

&nbsp;

## Publishing the Configuration
You can optionally publish the config file if you want to change any settings:

```bash
php artisan vendor:publish --provider="Chefhasteeth\FromFixture\FromFixtureServiceProvider" --tag="config"
```

Currently, there are two options you can change:

* `fixtures.path`: A string containing the path to your fixture files. By default, this is `{project_root}/database/fixtures/`.
* `fixtures.models.namespace`: The namespace where your models are located. By default, this is either `App` or `App\Models` depending on if you have a Models directory.

(These are also configurable via your .env file with the keys `FROM_FIXTURE_PATH` and `FROM_FIXTURE_MODEL_NAMESPACE`.)

&nbsp;

## Running the Test Suite
To run the test suite, make sure the dependencies are installed via `composer install` and then run:

```bash
composer test
```
