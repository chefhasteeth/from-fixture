<?php

namespace Chefhasteeth\FromFixture\Tests\Fixtures;

use Chefhasteeth\FromFixture\FromFixture;
use Chefhasteeth\FromFixture\Tests\Fixtures\TestRelation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestRelationFactory extends Factory
{
    use FromFixture;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TestRelation::class;

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
