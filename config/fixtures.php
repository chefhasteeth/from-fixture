<?php

return [
    'path' => env('FROM_FIXTURE_PATH', database_path('fixtures')),

    'models' => [
        'namespace' => env('FROM_FIXTURE_MODEL_NAMESPACE', is_dir(app_path('Models')) ? 'App\\Models\\' : 'App\\'),
    ],
];
