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
  
  <!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            fn: "required",
            ln: "required",
            cer:"required",
            nid:"required",
            img:"required",
            wp:"required",
                mid: {
                required: true,
                email: true
            },
            pwd: {
                required: true,
                minlength: 5
            },
            
            pwd1: {
                required: true,
                minlength: 5
            },
            agree: "required"
        },
        
        // Specify the validation error messages
        messages: {
            fn: "Please enter your first name",
            ln: "Please enter your last name",
            cer:"Add Your certificate here",
            nid:"Add your National Id card",
            img:"Add you image here",
            wp:"Select your work place",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
    
    </head>
    <body class="container" style="height: 800px;">
        <div class="jumbotron " style="text-align: center;">
            <h1>Doctor's Helper</h1>
        </div>
        <div style="background-color: #2aabd2;">
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div><div class="col-lg-offset-8 col-lg-2"><a href="#">Register</a> <a href="http://localhost/ADDBMS/Login/LoginView.php">Login</a></div>

        </div>
        <div class="col-lg-12" style="background-color: antiquewhite">
            <div class="col-lg-offset-4 col-lg-8">
                <h1 class="col-lg-offset-2">Register</h1>
                <form novalidate="novalidate" id="register-form" action="http://localhost/ADDBMS/Login/Register.php" method="post" enctype="multipart/form-data">
                    <table class="table-condensed">
                        <tr>
                            <td class="col-lg-2">First Name</td>
                            <td class=" col-lg-offset-2 col-lg-4"><input name="fn" class="input-sm"></td>
                            <td class="col-lg-2">
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-2">Last Name</td>
                            <td class=" col-lg-offset-2 col-lg-4"><input name="ln" class="input-sm"></td>
                            <td class="col-lg-2">
                                </td>
                        </tr>
                        <tr>
                            <td class="col-lg-2">Mail Id</td>
                            <td class=" col-lg-offset-2 col-lg-4"><input name="mid" class="input-sm"></td>
                            <td class="col-lg-2">
                                </td>
                        </tr>
                        <tr>
                            <td class="col-lg-2">Password</td>
                            <td class=" col-lg-offset-2 col-lg-4"><input name="pwd" type="password" class="input-sm"></td>
                            <td class="col-lg-2">
                                </td>
                        </tr>
                        <tr>
                            <td class="col-lg-2">Confirm Password</td>
                            <td class=" col-lg-offset-2 col-lg-4"><input name="pwd1" type="password" class="input-sm"></td>
                            <td class="col-lg-2">
                                </td>
                        </tr>
                        <tr>
                            <td class="col-lg-2">Image</td>
                            <td class=" col-lg-offset-2 col-lg-4"><input name="img" class="input-sm" type="file"></td>
                            <td class="col-lg-2">
                                </td>
                        </tr>
                        <tr>
                            <td class="col-lg-2">Certificate</td>
                            <td class=" col-lg-offset-2 col-lg-4"><input name="cer" class="input-sm" type="file"></td>
                            <td class="col-lg-2">
                                </td>
                        </tr>
                        <tr>
                            <td class="col-lg-2">Nid</td>
                            <td class=" col-lg-offset-2 col-lg-4"><input name="nid" class="input-sm" type="file"></td>
                            <td class="col-lg-2">
                                </td>
                        </tr>

                        <?php
                        $link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");

                        if (!$link) {
                            exit;
                        }
                        $linkres = [];
                        $linkres = $link->query('call GetWP()');
                        $numberofrow=(mysqli_num_rows($linkres));
                        mysqli_close($link);
                        ?>

                        <tr>
                            <td class="col-lg-2">Workplace</td>
                            <td class=" col-lg-offset-2 col-lg-4">
                                <select name="wp">
                                    <option value=""></option>
                                    <?php foreach ($linkres as $district):?>
                                    <option value=" <?php echo $district['id']; ?>"><?php echo $district['district']; ?></option>
                                    <?php endforeach;?>
                                </select> 
                            </td>
                            <td>
                                </td>
                        </tr>
                        <tr><td></td><td><br><br><br></td></tr>
                        <tr>
                            <td  class="col-lg-2"></td>
                            <td class=" col-lg-offset-2 col-lg-4"><input type="submit" value="Register" class="btn-success"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
