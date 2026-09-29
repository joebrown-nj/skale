<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// 1. Start secure session
session_start([
    'cookie_lifetime' => 0,
    'cookie_secure' => true,         // Requires HTTPS
    'cookie_httponly' => true,       // Prevents XSS cookie theft
    'cookie_samesite' => 'Strict'    // Mitigates CSRF
]);

require '../../vendor/autoload.php';

use App\Core\Environment;

Environment::boot(dirname(__DIR__, 2));

$db = new MysqliDb($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

require 'gatekeeper.php'; // Ensure the user is authenticated before proceeding

$tables = array();
$table = '';
$fields = array();
$success = array();
$error = array();
$getId = 0;

$r = $db->rawQuery('SHOW TABLES');
foreach ($r as $t) {
    $tables[] = $t['Tables_in_' . $_ENV['DB_NAME']];
}

if (isset($_GET['t'])) {
    $table = $_GET['t'];

    $tableDesc = $db->rawQuery('describe ' . $table);
    foreach ($tableDesc as $t) {
        $fields[] = $t;
    }

    $getId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

    if ($_POST) {
        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

        $db->where('id', $id);
        if ($db->update($table, $_POST)) {
            $success[] = $db->count . ' records were updated';
        } else {
            $error[] = 'update failed: ' . $db->getLastError();
        }
    }

    // EDIT PAGE
    if ($getId > 0) {
        $db->where('id', $getId);
        $data = $db->getOne($table);
    } else { // LISTING PAGE
        $columns = $db->rawQuery('SHOW COLUMNS FROM ' . $table);

        if(in_array('id', array_column($columns, 'Field'))) {
            $db->orderBy('id', 'DESC');
        }

        $tableData = $db->get($table);
    }
}

require('template.php');
