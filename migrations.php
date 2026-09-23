<?php

declare(strict_types=1);

return array(
    'table_storage' => array(
        'table_name' => 'doctrine_migration_versions',
        'version_column_length' => 191,
    ),
    'migrations_paths' => array(
        'DoctrineMigrations' => './migrations',
    ),
    // MySQL implicitly commits CREATE/ALTER/DROP TABLE statements, so wrapping
    // DDL migrations in transactions leaves Doctrine with invalid savepoints.
    'all_or_nothing' => false,
    'transactional' => false,
    'check_database_platform' => true,
);
