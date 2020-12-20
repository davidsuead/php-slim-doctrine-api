<?php

/**
 * Configuração para migration no Doctrine
 * @see https://www.doctrine-project.org/projects/doctrine-migrations/en/3.0/reference/configuration.html#migrations-configuration
 */
return [
    'table_storage' => [
        'table_name' => 'doctrine_migration_versions',
        'version_column_name' => 'version',
        'version_column_length' => 1024,
        'executed_at_column_name' => 'executed_at',
        'execution_time_column_name' => 'execution_time',
    ],
    'migrations_paths' => [
        'App\Migrations' => __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Migrations',
    ],
    'all_or_nothing' => true,
    'check_database_platform' => true
];