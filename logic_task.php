<?php

ini_set('display_errors', 0);
error_reporting(0);
include("Db_connection.php");
$connection = new database();
$con = $connection->database();

for($i=1;$i<=100;$i++)
{
   echo $i;

}

?>