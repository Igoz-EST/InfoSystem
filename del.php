<?php

$link = mysqli_connect("localhost", "root", "", "eks");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "Delete from students";


mysqli_query($link, $sql);
    
// Close connection
mysqli_close($link);

header('Location: view.php');
?>