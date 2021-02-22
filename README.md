# What is FromFixture?
**FromFixture** is a trait that allows your Laravel 8+ factories to seed the database and create models from JSON files.

## What are fixtures?
An exerpt from the [PHPUnit 9.5 documentation](https://phpunit.readthedocs.io/en/9.5/fixtures.html):

> One of the most time-consuming parts of writing tests is writing the code to set the world up in a known state and then return it to its original state when the test is complete. This known state is called the fixture of the test.

In other words, fixtures are just a snapshot of data you want to load before a test to ensure the inputs and outputs are consistent.
