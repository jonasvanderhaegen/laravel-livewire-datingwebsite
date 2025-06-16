<?php

declare(strict_types=1);

return [
    'connections' => [
        'user_shard_1' => [
            'driver' => env('DB_SHARD1_CONNECTION', env('DB_CONNECTION', 'sqlite')),
            'host' => env('DB_SHARD1_HOST', env('DB_HOST', '127.0.0.1')),
            'port' => env('DB_SHARD1_PORT', env('DB_PORT', '3306')),
            'database' => env('DB_SHARD1_DATABASE', 'shard1_db'),
            'username' => env('DB_SHARD1_USERNAME', env('DB_USERNAME', 'root')),
            'password' => env('DB_SHARD1_PASSWORD', env('DB_PASSWORD', '')),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],
        'user_shard_2' => [
            'driver' => env('DB_SHARD2_CONNECTION', env('DB_CONNECTION', 'sqlite')),
            'host' => env('DB_SHARD2_HOST', env('DB_HOST', '127.0.0.1')),
            'port' => env('DB_SHARD2_PORT', env('DB_PORT', '3306')),
            'database' => env('DB_SHARD2_DATABASE', 'shard2_db'),
            'username' => env('DB_SHARD2_USERNAME', env('DB_USERNAME', 'root')),
            'password' => env('DB_SHARD2_PASSWORD', env('DB_PASSWORD', '')),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],
        'user_shard_3' => [
            'driver' => env('DB_SHARD3_CONNECTION', env('DB_CONNECTION', 'sqlite')),
            'host' => env('DB_SHARD3_HOST', env('DB_HOST', '127.0.0.1')),
            'port' => env('DB_SHARD3_PORT', env('DB_PORT', '3306')),
            'database' => env('DB_SHARD3_DATABASE', 'shard3_db'),
            'username' => env('DB_SHARD3_USERNAME', env('DB_USERNAME', 'root')),
            'password' => env('DB_SHARD3_PASSWORD', env('DB_PASSWORD', '')),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],
    ],
];
