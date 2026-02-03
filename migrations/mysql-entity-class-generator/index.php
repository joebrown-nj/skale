<?php

//https://github.com/Kelltontech-Opensource/MySql-Entity-Class-Generator/tree/master

require_once __DIR__ . '/../../vendor/autoload.php';

$database = 'skaleup';
$db = new MysqliDb('localhost', 'root', '', $database);
$tableslist = $db->rawQuery('SHOW TABLES');

?>

<html>
<head>
    <title>PHP MYSQL Class Generator</title>
    <script src="../../public_html/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href="../../public_html/css/bootstrap.min.css " rel="stylesheet">
</head>
<body>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3>PHP MYSQL Class Generator</h3>
                    <p>This package can be used to generate classes that wrap rows of MySQL database tables providing an object oriented interface to manipulate the table row data.</p>

                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label>1) Select Table Name: </label>
                            <select name="tablename[]" multiple="multiple" class="form-control">
                                <?php foreach ($tableslist as $row) {
                                    print "<option value=\"{$row['Tables_in_skaleup']}\">{$row['Tables_in_skaleup']}</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>2) Type Class Name (ex. "test"):</label>
                            <input type="text" name="classname" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>3) Type Name of Key Field:</label>
                            <input type="text" name="keyname" class="form-control">
                            <p><small>(Name of key-field with type number with autoincrement!)</small></p>
                        </div>

                        <button type="submit" class="btn btn-primary">Generate Class</button>
                    </form>

<?php

if (!is_writable(dirname(__FILE__))){
    echo ('This Directory does not have write permissions, It may cause permission denial, Please give write permissions.');
}

if (@$_REQUEST["f"] == "") { } 
else {

    foreach ($_POST['tablename'] as $key => $val) {
        // fill parameters from form
        /* $table = $_REQUEST["tablename"];
        $class = $_REQUEST["classname"];
        $file_name = $_REQUEST["classname"];*/

        $table = $val;
        $class = $val;
        $file_name = $val;

        $key = $_REQUEST["keyname"];

        $dir = "C:\wamp64\www\skaleup\src\Models\Entities\\";
        $actualfile = $file_name . ".class" . ".php";
        $filename = $dir . "/entities/" . $actualfile;

        // if file exists, then delete it
        if (file_exists($filename)) {
            unlink($filename);
        } else {
            if (!is_dir($dir . "/entities/")) {
                if (!mkdir($dir . "/entities/", 0777, true)) {
                    echo ('Failed to create folders...');
                }
            }
        }

        // open file in insert mode
        $file = fopen($filename, "w+");
        $filedate = date("Y-m-d H:i:s");

        // Exclude Fields
        //Fields name : created_on,created,created_at
        $exFields = array("created_on", "created", "created_at");

        $c = "";
        $c = "<?php
   
/*
*
* -------------------------------------------------------
* CLASSNAME:        $class
* GENERATION DATE:  $filedate
* CLASS FILE:       $actualfile
* FOR MYSQL TABLE:  $table
* FOR MYSQL DB:     $database
* -------------------------------------------------------
*
*/

namespace App\Models\Entities;

class $class
{ 
";

        $sql = "SHOW COLUMNS FROM $table;";
        $result = $db->query($sql);

        foreach ($result as $row) {
            $col = $row['Field'];

            if (!in_array($col, $exFields)) {
                $c .= "    public $$col;   // (normal Attribute)";
                $c .= "

    ";
            }            
        }

        $cdb = "$" . "database";
        $cdb2 = "database";

        $cthis = "$" . "this->";
        $thisdb = $cthis . $cdb2 . " = " . "new Database();";
        $c .= "

    ";

        $c .= "
    

";

        $sql = "$" . "sql = ";
        $id = "$" . "id";
        $thisdb = "$" . "this->" . "database";
        $thisdbquery = "$" . "this->" . "database->query($" . "sql" . ")";
        $result = "$" . "result = ";
        $row = "$" . "row";
        $result1 = "$" . "result";
        $res = "$" . "result = $" . "this->database->result;";

        $key_row = "$" . "val";

        $thisinstance = "$" . "this->CI = & " . "get_instance();";
        $dbfrom = "$" . "this->CI->db->from('" . $table . "');";
        $dbcond = "$" . "this->CI->db->where('" . $key . "',$key_row);";
        $dbquery = "$" . "query = " . "$" . "this->CI->db->get();";
        $dbrow = "$" . "val =  $" . "query->row();";
        $c .= "
// **********************
// CONSTRUCTOR
// **********************

public function __construct($key_row=NULL)
{

    ";

        $sql = "SHOW COLUMNS FROM $table;";
        $result = $db->query($sql);
        foreach ($result as $row) { //echo "<pre>"; print_r($row);
            $col = $row['Field'];
            if (!in_array($col, $exFields)) {
                if ($row['Field'] == "org_id") {
                    $cthis = "$" . "this->" . $col . " =  !isset($" . "val->" . $col . ") ? " . " get_instance()->getOrgId()" . " : " . "$" . "val->" . $col;
                } else if (is_null($row['Default'])) {
                    $cthis = "$" . "this->" . $col . " =  !isset($" . "val->" . $col . ") ? NULL : " . "$" . "val->" . $col;
                } else if ($row['Default'] != "" && $row['Default'] != "CURRENT_TIMESTAMP") {
                    $cthis = "$" . "this->" . $col . " =  !isset($" . "val->" . $col . ") ? '" . $row['Default'] . "' : " . "$" . "val->" . $col;
                } else if ($row['Default'] == "CURRENT_TIMESTAMP") {
                    $cthis = "$" . "this->" . $col . " =  !isset($" . "val->" . $col . ") ? date('Y-m-d H:i:s') : " . "$" . "val->" . $col;
                } else {
                    $cthis = "$" . "this->" . $col . " = $" . "val->" . $col;
                }

                $c .= "
 $cthis;
         ";
            }
        }

        $c .= "
}
";

        // GETTER
        $result = $db->query($sql);
        foreach ($result as $row) {
            $col = $row['Field'];
            $mname = "get" . $col . "()";
            $mthis = "$" . "this->" . $col;
            if (!in_array($col, $exFields))
            {
                $c .= "
public function $mname
{
    return $mthis;
}
";
            }
        }

        $c .= "
// **********************
// SETTER METHODS
// **********************

";
        // SETTER
        $result = $db->query($sql);
        foreach ($result as $row) {
            $col = $row['Field'];
            if (is_null($row['Default'])) {
                $val = "!isset($" . "val->" . $col . ") ? NULL : " . "$" . "val->" . $col;
            } else if ($row['Default'] != "") {
                $val = "!isset($" . "val->" . $col . ") ? '" . $row['Default'] . "' : " . "$" . "val->" . $col;
            } else {
                $val = "$" . "val->" . $col;
            }

            $mname = "set" . $col . "($" . "val)";
            $mthis = "$" . "this->" . $col . " = ";

            if (!in_array($col, $exFields)) {
                $c .= "
public function $mname
{
    $mthis $val;
}
";
            }
        }

        $c .= "

} 

?>

";
        fwrite($file, $c);

?>
<p><b>PHP MYSQL Class Generator</b></p>
<p><b>Class '<?php echo $class; ?>' successfully generated as file '<?php echo $filename; ?>'!</b></p>
<p><a href="javascript:history.back();">back</a></p>
<?php

    } // End loop    
} // endif

?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
