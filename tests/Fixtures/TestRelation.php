<?php

namespace Chefhasteeth\FromFixture\Tests\Fixtures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestRelation extends Model
{
    use HasFactory;

    public $table = 'test_relations';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TestRelationFactory::new();
    }
}
