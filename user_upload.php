<?php
ini_set('display_errors', 0);
error_reporting(0);

    // Db Connection
    $con = mysqli_connect("localhost","root","","catalyst_task");

    /* Get a file path for passing cmd
    for ex: php user_upload.php C:\Users\Dhaval\Desktop\Task\users.csv */

    $filename = $argv[1];
    {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        {

            /* ucwords used to first letter capital from string
               strtolower used to other letter small from string
            */


            if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", strtolower($getData[2]))){
                echo "Invalid Email Address is : ".strtolower($getData[2]);

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
            echo "Success";
        }
        fclose($file);
    }
?>