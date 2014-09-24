<?php
    include "process/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>RACE | Trainer Allocation</title>
	<link rel="stylesheet" href="css/foundation.css" />
    <style>
        table tr th{
            text-align: center !important;
            font-size: 18px !important;
        }
        table tr td{
            text-align: center !important;
        }
        .accordion dd > a{
            background-color: #ccc;
        }
    </style>
</head>
<body style="background-color: #f9f9f9;">
    <div class="container" >
        <header >
            <div class="text-center" style="background-color: #000; padding: 7px 15px 15px 15px; color: #fff; font-size: 25px; width: 100%;">
                RACE Academy | <small>Trainer Allocation</small>
                <span class="left">
                    <a href="index.php" class="tiny button">&larr; Go Back</a>
                </span>
                <span class="right">
                    <a href="allocate.php" class="tiny button" >Allocate &rarr;</a>
                </span>
            </div>
        </header>
        <div class="row" style="margin-top: 10px;">
            <div class="large-12 columns">
                <table id="scheduleTable">
                    <thead>
                        <tr>
                            <th width="300">College</th>
                            <th width="100">Domains</th>
                            <th width="100">Level</th>
                            <th width="200">No. Of Sessions</th>
                            <th width="200">Program Date</th>
                            <th width="100">Trainer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data = "";
                            $query = "select * from colleges";
                            $qans = mysql_query($query) or die(mysql_error());
    
                            while($res = mysql_fetch_assoc($qans))
                            {
                                if($res['level'])
                                    $query1 = "select * from `allocated` where college_id=".$res['cid']." and domain='".$res['domain']."' and                                                          level=".$res['level'];
                                else
                                    $query1 = "select * from `allocated` where college_id=".$res['cid']." and domain='".$res['domain']."'";
                                $qans1 = mysql_query($query1) or die(mysql_error());
                                if(mysql_num_rows($qans1) == 0)
                                {
                                    $data .= "<tr>";
                                    $data .= "<td>".$res['college_name']."</td><td>".$res['domain']."</td><td>".$res['level']."</td>
                                          <td>".$res['sessions']."</td><td>".$res['start_date']." To ".$res['end_date']."</td>
                                          <td style='color: red;'>Not Allocated</td>";
                                    $data .= "</tr>";    
                                }
                                else
                                {
                                    while($qres = mysql_fetch_assoc($qans1))
                                    {
                                        $trainer_name = $qres['trainer_name'];
                                    }
                                    $data .= "<tr>";
                                    $data .= "<td>".$res['college_name']."</td><td>".$res['domain']."</td><td>".$res['level']."</td>
                                          <td>".$res['sessions']."</td><td>".$res['start_date']." To ".$res['end_date']."</td>
                                          <td style='color: green; font-weight: bold'>".$trainer_name."</td>";
                                    $data .= "</tr>";
                                }
                                
                            }

                            echo $data;
                            if(mysql_num_rows($qans) == 0)
                                echo "<tr id='noexist'><td colspan='3' style='text-align: left !important;'>Sorry! No data to display..</td></tr>";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='row'>
            <div class="large-12 columns">
                <small>*level 0 implies any level of expertise..</small>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <dl class="accordion" data-accordion>
                    <dd>
                        <a href="#panel1">Add New Schedule</a>
                        <div id="panel1" class="content">
                            <div class="row">
                                <div class="large-3 columns">                                   
                                    <input id="name" name="collegename" type="text" placeholder="College.."/>
                                </div>
                                <div class="large-1 columns">
                                    <input type="text" name="domain" id="dom" placeholder="Domain.." />
                                </div>
                                <div class="large-2 columns">
                                    <input type="number" name="levelofexpertise" id="level" placeholder="Level.." min="0" max="5"/>     
                                </div>
                                <div class="large-2 columns">
                                    <input type="number" name="noofsessions" id="session" id="session" placeholder="Session.." min="1" max="5" /> 
                                </div>
                                <div class="large-2 columns">
                                    <input type="date" name="startdate" id="start" placeholder="Start.."/>
                                </div>
                                <div class="large-2 columns">
                                    <input type="date" name="enddate" id="end" placeholder="End.."/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 small-12 columns">
                                    <input type="button" id="add_button" class="tiny button" value="Add Schedule" />
                                    
                                </div>
                            </div>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation/foundation.js"></script>
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/foundation/foundation.topbar.js"></script>
    <script src="js/foundation/foundation.accordion.js"></script>
    <script src="js/addnewschedule.js"></script>
    <script>
		$(document).foundation();
	</script>
</body>
</html>