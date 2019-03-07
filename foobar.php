<?php

ini_set('display_errors', 0);
error_reporting(0);
for($i=1;$i<=100;$i++)
{
    if (($i % 3 == 0) && ($i % 5 == 0))
    {
        $re = "foobar";
    }
    else if($i % 3 == 0)
    {
        $re = "foo";
    }
    else if($i % 5 == 0)
    {
        $re = "bar";
    }

    else
    {
        $re = $i;
    }
    echo $re.", ";
}
?>