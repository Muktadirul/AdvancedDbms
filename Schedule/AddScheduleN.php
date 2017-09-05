<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
    $USER = $_SESSION['USERNAME'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="container "style="background-color: wheat" >
        <div class="jumbotron " style="text-align: center;"style="height: 2800px;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
        </div>

        <div style="height: 3800px">
            <table class="col-lg-offset-1 col-lg-10" style="width: 90%;height: 20%;border: 1px solid black;">
                <tr style="border: 3px solid black;height: 90px;">
                    <th style="border: 3px solid black;width: 11%;">Day & Time</th>
                    <th style="border: 3px solid black;width: 11%;"><center>Sunday</center></th>
            <th style="border: 3px solid black;width: 11%;"><center>Monday</center></th>
                    <th style="border: 3px solid black;width: 11%;"><center>Tuesday</center></th>
                    <th style="border: 3px solid black;width: 11%;"><center>Wednesday</center></th>
                    <th style="border: 3px solid black;width: 11%;"><center>Thursday</center></th>
                    <th style="border: 3px solid black;width: 11%;"><center>Friday</center></th>
                    <th style="border: 3px solid black;width: 11%;"><center>Saturday</center></th>
                </tr>
               
                    <?php
                    for ($i = 0; $i < 24; $i++) {
                        echo '<tr style="height: 150px;">';
                        echo '<td style="border: 3px solid black;width: 11%;"><center>'.$i.':00'.'</center></td>';
                        echo '<td style="border: 1px solid black;width: 11%;"></td>';
                        echo '<td style="border: 1px solid black;width: 11%;"></td>';
                        echo '<td style = "border: 1px solid black;width: 11%;"></td>';
                        echo '<td style = "border: 1px solid black;width: 11%;"></td>';
                        echo '<td style = "border: 1px solid black;width: 11%;"></td>';
                        echo '<td style = "border: 1px solid black;width: 11%;"></td>';
                        echo '<td style = "border: 1px solid black;width: 11%;"></td></tr>';
                    }
                    ?>


                <tr><td></td></tr>
                    
            </table>
        </div>
    </body>
</html>


