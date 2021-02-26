<?php

namespace Chefhasteeth\FromFixture;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

trait FromFixture
{
    public function fromFixture(?string $fixture = null, ?array $default = null): Collection
    {
        $fixtures = json_decode(
            FixtureReader::getContents($fixture ?? $this->resolveFixtureNameFromModel()),
            true,
        );

        $factories = Collection::make();

        foreach ($fixtures as $data) {
            $factory = $this->model::factory()->state(
                Arr::except($data, ['_relationships', '_fixtureData'])
            );

            $this->createRelationshipsFromFixture(
                $factory,
                $data['_relationships'] ?? [],
            );

            $factories->add(tap($factory->create($default), function ($model) use ($data) {
                $model->setRelation('fixture', $data['_fixtureData'] ?? []);
            }));
        }

        return $factories;
    }

    protected function createRelationshipsFromFixture(Factory &$parent, array $relationships): void
    {
        foreach ($relationships as $relation) {
            [$method, $model, $name] = $this->parseRelationshipMethod($relation);

            $factory = $model::factory()->state($relation['data']);

            $this->createRelationshipsFromFixture($factory, $relation['_relationships'] ?? []);

            $parent = $parent->{$method}($factory, $name);
        }
    }

    protected function parseRelationshipMethod(array $relation): array
    {
        $params = [
            $relation['method'] ?? '',
            $relation['model'] ?? '',
            $relation['name'] ?? null,
        ];

        if (Str::contains($relation['method'], ':')) {
            $params = explode(':', $relation['method']);
        }

        $params[1] = (string) Str::of($params[1])->ltrim('\\')->start(config('fixtures.models.namespace'));
        $params[2] ??= null;

        return $params;
    }

    protected function resolveFixtureNameFromModel(): string
    {
        return Str::of($this->model)->afterLast('\\')->kebab()->plural() . '.json';
    }
}
