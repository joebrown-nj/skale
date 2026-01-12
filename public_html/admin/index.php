<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

require '../../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load('../../.env');
$dotenv->load('../../'.strtoupper($_ENV['APP_ENV']).'.env');

$db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

$tables = array();
$table = '';
$fields = array();
$success = array();
$error = array();
$getId = 0;

$r = $db->rawQuery('SHOW TABLES');
foreach ($r as $t) {
    $tables[] = $t['Tables_in_skaleup'];
}

if(isset($_GET['t'])) {
    $table = $_GET['t'];

    $tableDesc = $db->rawQuery('describe '.$table);
    foreach ($tableDesc as $t) {
        $fields[] = $t;
    }

    $getId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if($_POST){
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

        $db->where ('id', $id);
        if ($db->update ($table, $_POST)) {
            $success[] = $db->count . ' records were updated';
        } else {
            $error[] = 'update failed: ' . $db->getLastError();
        }
    }

    // EDIT PAGE
    if($getId > 0) {
        $db->where ('id', $getId);
        $data = $db->getOne ($table);
    } else { // LISTING PAGE
        $db->orderBy('id', 'desc');
        $tableData = $db->get($table);
    }
}

require('template.php');

?>