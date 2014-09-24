<?php
    include 'process/config.php';
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
                    <a href="allocate.php" class="tiny button">&larr;Allocated</a>
                </span>
                <span class="right">
                    <a href="colleges.php" class="tiny button" >Colleges &rarr;</a>
                </span>
            </div>
        </header>
        <div class="row" style="margin-top: 10px;">
            <div class="large-12 columns">
                <table id="trainerTable">
                    <thead>
                        <tr>
                            <th width="300">Trainer</th>
                            <th width="400">Domain</th>
                            <th width="300">Level Of Expertise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data = "";
                            $query = "select * from trainer";
                            $qans = mysql_query($query) or die(mysql_error());

                            while($res = mysql_fetch_assoc($qans))
                            {
                                $data .= "<tr>";
                                $data .= "<td>".$res['name']."</td><td>".$res['domain']."</td><td>".$res['level']."</td>";
                                $data .= "</tr>";
                            }

                            echo $data;
                            if(mysql_num_rows($qans) == 0)
                                echo "<tr id='noexist'><td colspan='3' style='text-align: left !important;'>Sorry! No data to display..</td></tr>";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <dl class="accordion" data-accordion>
                    <dd>
                        <a href="#panel1">Add New Trainer</a>
                        <div id="panel1" class="content">
                            <div class="row">
                                <div class="large-4 columns">                                   
                                    <input id="name" name="trainername" type="text" placeholder="Trainer Name.." required/>
                                </div>
                                <div class="large-4 columns">
                                    <input type="text" name="domain" id="dom" placeholder="Domain.." required/>
                                </div>
                                <div class="large-4 columns">
                                    <input type="text" name="levelofexpertise" id="level" placeholder="Level Of Expertise.." required/>     
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 small-12 columns">
                                    <input type="button" id="add_button" class="tiny button" value="Add Trainer" />
                                    <span id="add_status"></span>
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
    <script src="js/addnewtrainer.js"></script>
    <script>
		$(document).foundation();
	</script>
</body>
</html>