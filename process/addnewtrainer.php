<?php
    include 'config.php';
    if(isset($_POST['name']) && isset($_POST['domain']) && isset($_POST['level']) && !empty($_POST['name']) && !empty($_POST['domain']) && !empty($_POST['level']))
    {
        $name = ucfirst(mysql_real_escape_string(htmlentities($_POST['name'])));
        $domain = strtoupper(mysql_real_escape_string(htmlentities($_POST['domain'])));
        $level = mysql_real_escape_string(htmlentities($_POST['level']));
        $data = "";
        
        $query = "insert into `trainer` (name,domain,level) values ('$name','$domain','$level')";
        mysql_query($query) or die(mysql_error());

        $data .= "<tr>";
        $data .= "<td>".$name."</td><td>".$domain."</td><td>".$level."</td>";
        $data .= "</tr>";

        echo $data;
    }
        echo "";
?>