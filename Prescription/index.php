<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
    $USER = $_SESSION['USERNAME'];
}  else {
    header("Location: ./Login/LoginView.php");die();
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
    <body class="container"style="background-color: wheat" >
        <div class="jumbotron " style="text-align: center;"style="height: 800px;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
            <div class="col-lg-offset-8 col-lg-2"> 
                <?php if (!isset($_SESSION['USERNAME'])) {
                    echo '<a href="http://localhost/ADDBMS/Login/RegisterView.php">Register</a> <a href="http://localhost/ADDBMS/Login/LoginView.php">Login</a></div>';
                }  else {
                   echo '<a href="http://localhost/ADDBMS/Login/Logout.php">Logout</a></div>'; 
                }
                 ?> 

            
        </div>
        </div>
        <div class="col-lg-offset-3 col-lg-9">
            <h1>Welcome <?php echo $USER; ?></h1>
        </div>
        <div class="col-lg-10"><br><br><br></div>
        
    </body>
</html>



