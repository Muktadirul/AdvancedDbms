<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
    $USER = $_SESSION['USERNAME'];
}  else {
    header("Location: ../Login/LoginView.php");die();
}
class Data {

    public $title = "";
    public $start = "";
    public $end = "";
}
$data = new Data();
$UID = $_SESSION['USERID'];
$link = mysqli_connect("127.0.0.1", "root", "", "doc_schedule_prescription");
$pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
$sql = ' CALL ScheduleGet(:m1);';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':m1', $UID, PDO::PARAM_STR);
$stmt->execute();
$stack = array();
while ($row = $stmt->fetch()) {
    $data->title= $row['title'];
    $data->start = $row['Start_time'];
    $data->end = $row['end_time'];
    array_push($stack,$data);
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
    
<meta charset='utf-8' />
<link href='fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='moment.min.js'></script>
<script src='jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '<?php echo date("Y-m-d"); ?>',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($stack); ?>
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
                
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
                background-color: #ffffff;
	}

</style>
</head>

    <body class="container"style="background-color: wheat" >
        <div class="jumbotron " style="text-align: center;"style="height: 10px;">
            <h1>Doctor's Helper</h1>
        </div>
        <div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a> </div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
            <div class="col-lg-2"><a href="http://localhost/ADDBMS/">Home</a></div>
        </div>
        <br><br>
        <div id='calendar'></div>
        <div class="col-lg-offset-1 col-lg-5"><h1>Add a Schedule</h1></div>
        <div  style="height: 800px">
            <form class=" col-lg-offset-2 col-lg-10" method="post" action="AddController.php">
                <table >
                    <tr >
                        <td class="col-lg-3">Start Time </td>
                        <td class="col-lg-7">
                            <select id="shr" name="hr">
                                <option value="-1">----</option>
                                <?php for ($i = 0; $i < 24; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <select id="smin" name="min">
                                <option value="-1">----</option>
                                <?php for ($i = 0; $i < 60; $i++): ?>
                                    <option><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>

                        </td>
                    </tr>
                    <tr >
                        <td class="col-lg-3">End Time </td>
                        <td class="col-lg-7">
                            <select id="shr" name="hr">
                                <option value="-1">----</option>
                                <?php for ($i = 0; $i < 24; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <select id="smin" name="min">
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
                        <td class="col-lg-3">Description</td>
                        <td class=" col-lg-10"><textarea id="des" name="des" style="height: 150px;width: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="col-lg-10"><button>Add</button></td>
                    </tr>
                </table>
            </form>
        </body>
</div>



</html>
