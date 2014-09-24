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
                        <a href="colleges.php" class="tiny button">&larr; Colleges</a>
                    </span>
                    <span class="right">
                        <a href="index.php" class="tiny button" >Trainers &rarr;</a>
                    </span>
                </div>
            </header>
            <?php
                $data = "";
                $query = "select * from `colleges` where cid not in (select college_id from `allocated`) order by college_name";
                $qans = mysql_query($query) or die(mysql_error());
                $i = 1;
                //echo mysql_num_rows($qans)."\n";
                if(mysql_num_rows($qans)==0)
                {
                    echo "<div class='row'>
                            <div class='large-12 columns'>
                                <h1>Nothing to allocate as of now..</h1>
                            </div>
                          </div>";
                }
                echo "<div class='row'>";
                echo "<div class='large-12 columns'>";
                echo "<dl class='accordion' data-accordion>";
                while($qres = mysql_fetch_assoc($qans))
                {
                    //if level if 1 - 5
                    if($qres['level'])
                    {
                        $query1 = "select * from trainer where level=".$qres['level']." and domain='".$qres['domain']."' and 
                                   tid not in (select trainer_id from allocated)";
                        $qans1 = mysql_query($query1) or die(mysql_error());
                        if(mysql_num_rows($qans1) == 0)
                        {
                            echo "<dd>
                                    <a href='#panel".$i."'>".$qres['college_name']."</a>
                                        <div id='panel".$i."' class='content'>
                                            <div class='row'>
                                                <div classs='large-12 columns'>
                                                    <p>Either no trainer matches the requirements or trainer already allocated.</p>
                                                </div>
                                            </div>
                                        </div>
                                  </dd>";    
                        }
                        else if(mysql_num_rows($qans1) == 1)
                        {
                            while($qres1 = mysql_fetch_assoc($qans1))
                            {
                                $college_id = $qres['cid'];
                                $trainer_id = $qres1['tid'];
                                $college_name = $qres['college_name'];
                                $trainer_name = $qres1['name'];
                                $level = $qres1['level'];
                                $domain = $qres1['domain'];
                                $query2 = "insert into allocated (college_id,trainer_id,college_name,trainer_name,domain,level)
                                           values ($college_id,$trainer_id,'$college_name','$trainer_name','$domain',$level)";
                            mysql_query($query2) or die(mysql_error());
                            echo "<dd>
                                    <a href='#panel".$i."' >".$qres['college_name']."</a>
                                        <div id='panel".$i."' class='content'>
                                            <div class='row'>
                                                <div class='large-12 columns'>
                                                    <p>Trainer has been allocated. Check colleges page..</p>
                                                </div>
                                            </div>
                                        </div>
                                  </dd>";    
                            }
                            
                        }
                    else if(mysql_num_rows($qans1)>1)
                    {
                        echo "<dd>
                            <a href='#panel".$i."'>".$qres['college_name']."</a>
                                <div id='panel".$i."' class='content'>
                                    <div class='row'>
                                        <div class='large-12 columns'>
                                            <form action='process/allocate.php' method='post'>
                                                 <table id='allocateTable'>
                                                    <thead>
                                                        <tr>
                                                            <th width=\"100\">Select</th>
                                                            <th width=\"300\">College</th>
                                                            <th width=\"200\">Trainer</th>
                                                            <th width=\"150\">Domain</th>
                                                            <th width=\"250\">Level Of Expertise</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                        while($qres1 = mysql_fetch_assoc($qans1))
                        {
                            echo "<tr>
                                <td><input type='radio' name='trainersel' id='select' /></td>
                                <td>".$qres['college_name']."</td>
                                <td>".$qres1['name']."</td>
                                <td>".$qres1['domain']."</td>
                                <td>".$qres1['level']."</td>
                                </tr>
                                <input type='hidden' name='cid' value='".$qres['cid']."' />
                                <input type='hidden' name='tid' value='".$qres1['tid']."' />
                                <input type='hidden' name='college_name' value='".$qres['college_name']."' />
                                <input type='hidden' name='trainer_name' value='".$qres1['name']."' />
                                <input type='hidden' name='domain' value='".$qres1['domain']."' />
                                <input type='hidden' name='level' value='".$qres1['level']."' />";
                            
                        }
                            echo "</div>
                            </div>";
                            echo "</tbody>
                        </table>";
                        echo "<div class='row'>
                                    <div class='large-12 columns'>
                                        <input type='submit' name='submit' value='Allocate' class='tiny button' />
                                    </div>
                              </div>
                            </form>
                        </div> 
                    </dd>";    
                        }
                       $i++;
                    }
                    else
                    {
                        $query1 = "select * from trainer where domain='".$qres['domain']."' and 
                                   tid not in (select trainer_id from allocated)";
                        $qans1 = mysql_query($query1) or die(mysql_error());
                        if(mysql_num_rows($qans1) == 0)
                        {
                            echo "<dd>
                                    <a href='#panel".$i."'>".$qres['college_name']."</a>
                                        <div id='panel".$i."' class='content'>
                                            <div class='row'>
                                                <div classs='large-12 columns'>
                                                    <p>Either no trainer matches the requirements or trainer already allocated.</p>
                                                </div>
                                            </div>
                                        </div>
                                  </dd>";    
                        }
                        else if(mysql_num_rows($qans1) == 1)
                        {
                            while($qres1 = mysql_fetch_assoc($qans1))
                            {
                                $college_id = $qres['cid'];
                                $trainer_id = $qres1['tid'];
                                $college_name = $qres['college_name'];
                                $trainer_name = $qres1['name'];
                                $level = $qres1['level'];
                                $domain = $qres1['domain'];
                                $query2 = "insert into allocated (college_id,trainer_id,college_name,trainer_name,domain,level)
                                           values ($college_id,$trainer_id,'$college_name','$trainer_name','$domain',$level)";
                            mysql_query($query2) or die(mysql_error());
                            echo "<dd>
                                    <a href='#panel".$i."' >".$qres['college_name']."</a>
                                        <div id='panel".$i."' class='content'>
                                            <div class='row'>
                                                <div class='large-12 columns'>
                                                    <p>Trainer has been allocated. Check colleges page..</p>;
                                                </div>
                                            </div>
                                        </div>
                                  </dd>";    
                            }
                            
                        }
                    else if(mysql_num_rows($qans1)>1)
                    {
                        echo "<dd>
                            <a href='#panel".$i."'>".$qres['college_name']."</a>
                                <div id='panel".$i."' class='content'>
                                    <div class='row'>
                                        <div class='large-12 columns'>
                                            <form action='process/allocate.php' method='post'>
                                                 <table id='allocateTable'>
                                                    <thead>
                                                        <tr>
                                                            <th width=\"100\">Select</th>
                                                            <th width=\"300\">College</th>
                                                            <th width=\"200\">Trainer</th>
                                                            <th width=\"150\">Domain</th>
                                                            <th width=\"250\">Level Of Expertise</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                        while($qres1 = mysql_fetch_assoc($qans1))
                        {
                            echo "<tr>
                                <td><input type='radio' name='trainersel' id='select' /></td>
                                <td>".$qres['college_name']."</td>
                                <td>".$qres1['name']."</td>
                                <td>".$qres1['domain']."</td>
                                <td>".$qres1['level']."</td>
                                </tr>
                                <input type='hidden' name='cid' value='".$qres['cid']."' />
                                <input type='hidden' name='tid' value='".$qres1['tid']."' />
                                <input type='hidden' name='college_name' value='".$qres['college_name']."' />
                                <input type='hidden' name='trainer_name' value='".$qres1['name']."' />
                                <input type='hidden' name='domain' value='".$qres1['domain']."' />
                                <input type='hidden' name='level' value='".$qres1['level']."' />";
                            
                        }
                            echo "</div>
                            </div>";
                            echo "</tbody>
                        </table>";
                        echo "<div class='row'>
                                    <div class='large-12 columns'>
                                        <input type='submit' name='submit' value='Allocate' class='tiny button' />
                                    </div>
                              </div>
                            </form>
                        </div> 
                    </dd>";    
                        }
                       $i++;
                        
                    }
                }
                echo "</dl>";
                echo "</div>";
                echo "</div>";
            ?>
        </div>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation/foundation.js"></script>
        <script src="js/vendor/modernizr.js"></script>
        <script src="js/foundation/foundation.topbar.js"></script>
        <script src="js/foundation/foundation.accordion.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>