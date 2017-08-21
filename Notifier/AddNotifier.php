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
    <body class="container"style="background-color: wheat" >
        <div class="jumbotron " style="text-align: center;"style="height: 800px;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
        </div>

        <div class="col-lg-offset-1 col-lg-5"><h1>Add a Notifier</h1></div>
        <div  style="height: 800px">
            <form class=" col-lg-offset-2 col-lg-10" method="post" action="AddController.php">
                <table >
                    <tr >
                        <td class="col-lg-3">Topics Name</td>
                        <td class="col-lg-7"><input id="topics_name" name="topics_name"></td>
                    </tr>
                    <tr >
                        <td class="col-lg-3">Time </td>
                        <td class="col-lg-7">
                            <select id="hr" name="hr">
                                <option value="-1">----</option>
                                <?php for ($i = 0; $i < 24; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <select id="min" name="min">
                                <option value="-1">----</option>
                                <?php for ($i = 0; $i < 60; $i++): ?>
                                    <option><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">Date</td>
                        <td class="col-lg-7">
                            <select id="day" name="day">
                                <option value="-1">----</option>
                                <?php for ($i = 1; $i < 32; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <select id="month" name="month">
                                <option value="-1">----</option>
                                <?php for ($i = 1; $i < 12; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <select id="year" name="year">
                                <option value="-1">----</option>
                                <?php for ($i = 2017; $i < 3017; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                    <tr >
                        <td class="col-lg-3">Message</td>
                        <td class=" col-lg-10"><textarea id="msg" name="msg" style="height: 150px;width: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="col-lg-10"><button>Add</button></td>
                    </tr>
                </table>
            </form>

        </div>

    </body>

</html>