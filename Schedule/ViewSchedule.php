<?php
session_start();
$UID = $_SESSION['USERID'];
//echo $UID;
$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$sql = ' CALL `ScheduleGet`(:m1);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1', $UID, PDO::PARAM_STR);
$stmt->execute();
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
    <body class="container"style="background-color: wheat" >
        <div class="jumbotron " style="text-align: center;"style="height: 800px;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
        </div>

        <div class="col-lg-offset-1 col-lg-5"><h1>LIST OF Schedules</h1></div>
        <div  style="height: 800px">
            <table class="col-lg-offset-1 col-lg-10" style="width: 90%;height: 30%;border: 1px solid black;">
                <tr style="border: 3px solid black;">
                    <td style="border: 3px solid black;">Title</td>
                    <td style="border: 3px solid black;">Start_time</td>
                    <td style="border: 3px solid black;">end_time</td>
                    <td style="border: 3px solid black;">description</td>
                    
                    <td style="border:  solid black;">Update</td>
                    <td style="border:  solid black;">Delete</td>
                </tr>

                <tr style="border: 3px solid black;">
                    <?php
                    while ($row = $stmt->fetch()) {
                        echo '<td style="border: 3px solid black;">' . $row['title'] . '</td>';
                        echo '<td style="border: 3px solid black;">' . $row['Start_time'] . '</td>';
                        echo '<td style="border: 3px solid black;">' . $row['end_time'] . '</td>';
                        echo '<td style="border: 3px solid black;"><textarea disabled style="height: 80px;width: 300px;">' .$row['description']. '</textarea></td>';
                        $X="http://localhost/ADDBMS/Schedule/";
                        echo '<td style="border: 3px solid black;"><a href='.$X.'UpdateSchedule.php?scid='.$row['scid']."><button >Update</button></a></td>";
                        echo '<td style="border: 3px solid black;"><a href='.$X.'DeleteSchedule.php?scid='.$row['scid']."><button >Delete</button></a></td>";
                        echo '</tr><br>';
                    }
                    ?>      
            </table>
            


        </div>
        <a href="../UserHome.php">Back</a>
    </body>

</html>