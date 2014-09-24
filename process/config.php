<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "race";
    mysql_connect($server,$username,$password) or die(mysql_error());
    mysql_select_db($dbname);
?>