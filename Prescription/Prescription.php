<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
    $USER = $_SESSION['USERNAME'];
} else {
    header("Location: http://localhost/ADDBMS/Login/LoginView.php");
    die();
}
$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$sql = ' CALL ALLProblem(:m1);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1', $UID, PDO::PARAM_STR);
$stmt->execute();
$all=$stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/ADDBMS/Resource/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script>
        function myFunction(list){
    var text = "";
    var inputs = document.getElementById("Problems");
    for (var i = 0; i < inputs.length; i++) {
        text += inputs[i].value;
    }
    var li = document.createElement("li");
    var node = document.createTextNode(text);
    li.appendChild(node);
    document.getElementById("list").appendChild(li);
}
        </script>
    
    </head>
    
    <body class="container"style="background-color: wheat" >
        <div class="jumbotron " style="text-align: center;"style="height: 800px;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
            <div class="col-lg-offset-8 col-lg-2"> 
                <?php
                if (!isset($_SESSION['USERNAME'])) {
                    echo '<a href="http://localhost/ADDBMS/Login/RegisterView.php">Register</a> <a href="http://localhost/ADDBMS/Login/LoginView.php">Login</a></div>';
                } else {
                    echo '<a href="http://localhost/ADDBMS/Login/Logout.php">Logout</a></div>';
                }
                ?> 


            </div>
        </div>
        <div class="col-lg-offset-3 col-lg-9">
            <h1>Welcome <?php echo $USER; ?></h1>
        </div>
        <div class="col-lg-10"><br><br><br></div>
        <div class="col-lg-10">
            <table style="width: 130%">
                <tr>
                    
                    <td>Name</td>
                    <td><input></td>
                    <td>Address</td>
                    <td><textarea></textarea></td>
                    <td>mail id</td>
                    <td><input></td>
                    <td>Age
                        <select>
                        <option value="-1">----</option>
                                <?php for ($i = 1; $i < 80; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                        </select></td>
                    <td>Sex <select>
                        <option value="1">Male</option>
                                <option value="2">Female</option>
                        </select>
                    </td>
                    <td>
                        Weight
                         <select>
                        <option value="-1">----</option>
                                <?php for ($i = 1; $i < 151; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                        </select>
                    </td>
                    <td>
                        Blood Pressure
                        <select>
                        <option value="-1">----</option>
                                <?php for ($i = 1; $i < 180; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                        </select>  /
                        <select>
                        <option value="-1">----</option>
                                <?php for ($i = 1; $i < 180; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                	
            </table>
            <div class="col-lg-10"><br><br><br></div>
            <div class="col-lg-10"><h1>Previous Problems list</h1></div>
            <table style="width: 100%">
                <?php for($ii=1;$ii<11;$ii++):?>
                <tr>
                    
                    <td>Previous Problems List <?php echo $ii;?> <select id="Problems">
                        <option value="-1">----</option>
                            <?php foreach ($all as $a):?> 
                            <option value="<?php echo $a['indication_id']; ?>"><?php echo $a['indication_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    
                </tr>
                <?php echo '<td><br></td>';endfor; ?>
            </table>
            <div class="col-lg-10"><br><br><br></div>
            <div class="col-lg-10"><h1>Patients Current Problems list</h1></div>
            <table style="width: 100%">
                <?php for($ii=1;$ii<11;$ii++):?>
                <tr>
                    
                    <td>Current Problems List <?php echo $ii;?> <select id="Problems">
                        <option value="-1">----</option>
                            <?php foreach ($all as $a):?> 
                            <option value="<?php echo $a['indication_id']; ?>"><?php echo $a['indication_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    
                </tr>
                <?php echo '<td><br></td>';endfor; ?>
            </table>
            
            <table>
                <tr>
                    <td><ul id="list"></ul></td>
                </tr>
            </table>
            
            <table style="width: 120%;border: 1px solid black">
                <tr>
                    <td>Drugs Name</td>
                    <td>Drugs Dose</td>
                    <td>Drugs Amount</td>
                    <td>How Long</td>
                    <td>Before</td>
                    <td>after</td>
                </tr>
                <tr>
                    <td>Drugs Name</td>
                    <td>Drugs Dose</td>
                    <td>Drugs Amount</td>
                    <td>How Long</td>
                    <td>Before</td>
                    <td>after</td>
                </tr>
            </table>
        </div>
    </body>
</html>



