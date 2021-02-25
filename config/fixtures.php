<?php

return [
    /**
     * The path to the fixture files. By default, this is `{root}/database/fixtures`.
     */
    'path' => env('FROM_FIXTURE_PATH', database_path('fixtures')),

    /**
     * The namespace for the models in your app. If you have a Models directory,
     * it will be \App\Models, otherwise just \App.
     */
    'models' => [
        'namespace' => env('FROM_FIXTURE_MODEL_NAMESPACE', is_dir(app_path('Models')) ? 'App\\Models\\' : 'App\\'),
    ],
];
