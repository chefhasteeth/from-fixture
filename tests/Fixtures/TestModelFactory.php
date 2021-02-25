<?php

namespace Chefhasteeth\FromFixture\Tests\Fixtures;

use Chefhasteeth\FromFixture\FromFixture;
use Chefhasteeth\FromFixture\Tests\Fixtures\TestModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestModelFactory extends Factory
{
    use FromFixture;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TestModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
