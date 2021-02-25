<?php

namespace Chefhasteeth\FromFixture\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        app('config')->set('fixtures.path', __DIR__ . DIRECTORY_SEPARATOR . 'Fixtures');
        app('config')->set('fixtures.models.namespace', 'Chefhasteeth\\FromFixture\\Tests\\Fixtures\\');

        $this->setUpDatabase();
    }

    protected function setUpDatabase()
    {
        Schema::dropAllTables();

        Schema::create('test_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        Schema::create('test_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_model_id');
            $table->string('name')->nullable();
        });
    }
}
