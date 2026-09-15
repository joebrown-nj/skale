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
    'all_or_nothing' => true,
    'check_database_platform' => true,
);
