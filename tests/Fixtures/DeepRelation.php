<?php

namespace Chefhasteeth\FromFixture\Tests\Fixtures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeepRelation extends Model
{
    use HasFactory;

    public $table = 'deep_relations';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return DeepRelationFactory::new();
    }
}
