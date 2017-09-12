<?php

//$SqlNotLike=$_GET['sql1'];
//$SqlLike=$_GET['sql2'];
//echo $SqlLike;
//echo $SqlNotLike;
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=doc_schedule_prescription", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt search query execution
try{
    if(isset($_REQUEST['term'])){
        $sql = "CALL ALLMedecine(:m1);";
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST['term'] . '%';
        $stmt->bindParam(':m1', $term);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                echo "<p>" . $row['generic_name'] . "</p>";
            }
        } else{
            echo "<p>No matches found";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>