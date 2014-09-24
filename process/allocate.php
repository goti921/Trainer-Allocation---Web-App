<?php
    include 'config.php';
    $cid = $_POST['cid'];
    $tid = $_POST['tid'];
    $college_name = $_POST['college_name'];
    $trainer_name = $_POST['trainer_name'];
    $domain = $_POST['domain'];
    $level = $_POST['level'];
    $query = "insert into allocated (college_id,trainer_id,college_name,trainer_name,domain,level) values
              ($cid,$tid,'$college_name','$trainer_name','$domain',$level)";
    mysql_query($query) or die(mysql_error());
    header('location: ../allocate.php');
?>