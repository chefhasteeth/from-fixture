<?php

namespace Chefhasteeth\FromFixture\Tests\Fixtures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasFactory;

    public $table = 'test_models';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TestModelFactory::new();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function testRelation()
    {
        return $this->hasOne(TestRelation::class);
    }
}
