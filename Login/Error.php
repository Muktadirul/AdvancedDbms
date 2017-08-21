<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
  
    
    </head>
    <body class="container" style="height: 800px;">
        <div class="jumbotron " style="text-align: center;">
            <h1>Doctor's Helper</h1>
        </div>
        <div style="background-color: #2aabd2;">
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div><div class="col-lg-offset-8 col-lg-2"><a href="http://localhost/ADDBMS/Login/RegisterView.php">Register</a> <a href="http://localhost/ADDBMS/Login/LoginView.php">Login</a></div>

        </div>
        <div class="col-lg-12" style="background-color: antiquewhite">
            <div class="col-lg-offset-4 col-lg-8">
                <h1 class="col-lg-offset-2"><?php echo $_GET['t']; ?></h1>
  
            </div>
        </div>
    </body>
</html>
