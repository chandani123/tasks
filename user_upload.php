<?php

    // Db Connection
    $con = mysqli_connect("localhost","root","","catalyst_task");

    /* Get a file path for passing cmd
    for ex: php user_upload.php C:\Users\Dhaval\Desktop\Task\users.csv */

    $filename = $argv[1];
    {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $sql = "INSERT into users (name,surname,email) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."')";
            $result = mysqli_query($con,$sql);
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