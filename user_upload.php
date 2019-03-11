<?php
/*
    => Get a file path for passing cmd
    => for ex: php user_upload.php C:\Users\Dhaval\Desktop\Task\users.csv
    => ucwords used to first letter capital from string
    => strtolower used to other letter small from string
*/

ini_set('display_errors', 0);
error_reporting(0);
include("Db_connection.php");
$connection = new database();
$con = $connection->database();


// Create a database
        $sql_createDB = "CREATE DATABASE created_DB ";
        mysqli_query($con,$sql_createDB);

         $sql_CreateTable =  "CREATE TABLE created_DB.users (
                    userID int(10)  AUTO_INCREMENT,
                    name varchar(250),
                    surname varchar(250),
                    email varchar(250),
                    PRIMARY KEY (userID),
                    UNIQUE KEY (email))";
        mysqli_query($con,$sql_CreateTable);


        $filename = $argv[1];
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        {

            if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", strtolower($getData[2]))){
                echo "Invalid Email Address is : ".strtolower($getData[2]); ?><br>
            <?php
            }else{

                 $fname = "";$sname="";$email="";
                    $fname = mysqli_real_escape_string($con,$getData[0]);
                    $sname = mysqli_real_escape_string($con,$getData[1]);
                    $email = mysqli_real_escape_string($con,$getData[2]);

                    $sql = "INSERT into users (name,surname,email)
                           values ('".ucwords(strtolower($fname))."','".ucwords(strtolower($sname))."','".strtolower($email)."')";
                    $result = mysqli_query($con,$sql);
            }
        }
        if(!isset($result))
        {
            echo "Invalid File:Please Upload CSV File.";

        }
        else {
            echo "FILE IMPORT SUCCESSFULLY";
        }
        fclose($file);
?>