<?php

namespace Chefhasteeth\FromFixture\Tests;

use Chefhasteeth\FromFixture\Tests\Fixtures\TestModel;
use Illuminate\Support\Collection;

class FromFixtureTest extends TestCase
{
    /** @test */
    public function returnsCollectionOfAppropriateModels()
    {
        $models = TestModel::factory()->fromFixture('models.json');

        $this->assertInstanceOf(Collection::class, $models);
        $this->assertCount(3, $models);
    }

    /** @test */
    public function theCorrectRelationshipsAreCreated()
    {
        $models = TestModel::factory()->fromFixture('models-with-relations.json');

        $this->assertSame('Osamu', $models->first()->testRelation->name);
        $this->assertCount(3, $models->map->testRelation->filter());
    }
}
