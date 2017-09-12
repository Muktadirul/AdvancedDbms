<?php

//echo $_GET['Name'].'<br>';
//echo $_GET['email'].'<br>';
//echo $_GET['age'].'<br>';
//echo $_GET['sex'].'<br>';
//echo $_GET['Weight'].'<br>';
//echo $_GET['Bp'].'<br>';
//echo $_GET['Phone'].'<br>';
//echo '<script>document.getElementById("demo");</script>';
echo '<div id="DEM"></div>';

?>
<div id="DEM"></div>
<script>
    var innerdata=document.getElementById('demo').getAttribute('value');
    document.getElementById('DEM').value=innerdata;
    //document.getElementById("demo");
</script>    
