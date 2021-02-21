<?php

namespace Chefhasteeth\FromFixture;

class FixtureReader
{
    public static function getContents(string $file): string
    {
        return file_get_contents(database_path("fixtures/{$file}"));
    }
}
