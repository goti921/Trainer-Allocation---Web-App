<?php
    include 'config.php';
    if(isset($_POST['name']) && isset($_POST['domain']) && isset($_POST['level']) && isset($_POST['session']) && isset($_POST['start']) && isset($_POST['end']) && !empty($_POST['name']) && !empty($_POST['domain'])  && !empty($_POST['session']) && !empty($_POST['start']) && !empty($_POST['end']))
    {
        $name = ucfirst(mysql_real_escape_string(htmlentities($_POST['name'])));
        $domain = strtoupper(mysql_real_escape_string(htmlentities($_POST['domain'])));
        $level = mysql_real_escape_string(htmlentities($_POST['level']));
        $session = mysql_real_escape_string(htmlentities($_POST['session']));
        $start = mysql_real_escape_string(htmlentities($_POST['start']));
        $end = mysql_real_escape_string(htmlentities($_POST['end']));
        $data = "";
        
        $query = "insert into `colleges` (college_name,domain,level,sessions,start_date,end_date) values ('$name','$domain','$level','$session','$start','$end')";
        mysql_query($query) or die(mysql_error());

        $data .= "<tr>";
        $data .= "<td>".$name."</td><td>".$domain."</td><td>".$level."</td><td>".$session."</td><td>".$start." To ".$end."</td><td style='color: red'>Not Allocated</td>";
        $data .= "</tr>";

        echo $data;
    }
    else
        echo "";
?>