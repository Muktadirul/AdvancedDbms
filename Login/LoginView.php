<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="container" style="height: 800px;">
        <div class="jumbotron " style="text-align: center;">
            <h1>Doctor's Helper</h1>
        </div>
        <div style="background-color: #2aabd2;">
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div><div class="col-lg-offset-8 col-lg-2"><a href="http://localhost/ADDBMS/Login/RegisterView.php">Register  </a><a href="http://localhost/ADDBMS/Login/LoginView.php">Login</a></div>
            
        </div>
        <div class="col-lg-12" style="background-color: antiquewhite">
            <div class="col-lg-offset-4 col-lg-8">
                <h1 class="col-lg-offset-2">Login</h1>
                <form action="http://localhost/ADDBMS/Login/Login.php" method="post" enctype="multipart/form-data">
                    <table class="table-condensed">
                    
                    <tr>
                        <td class="col-lg-2">Mail Id</td>
                        <td class=" col-lg-offset-2 col-lg-4"><input name="mid" class="input-sm"></td>
                    </tr>
                    <tr>
                        <td class="col-lg-2">Password</td>
                        <td class=" col-lg-offset-2 col-lg-4"><input name="pwd" type="password" class="input-sm"></td>
                    </tr>
                    
                    <tr>
                        <td  class="col-lg-2"></td>
                        <td class=" col-lg-offset-2 col-lg-4"><button class="btn-success">Login</button></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </body>
</html>
