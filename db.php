<html>
  <head>
    <title>Lesson</title>
  </head>

<body>
 <div>
	<?php
  
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create database query execution
$sql = "CREATE DATABASE eks";
if(mysqli_query($link, $sql)){
    echo "Database created successfully\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
  

$link = mysqli_connect("localhost", "root", "", "eks");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 


$sql = "CREATE TABLE students
(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,    
last_name VARCHAR(20) NOT NULL,
first_name VARCHAR(20) NOT NULL,
isik VARCHAR(11) NOT NULL UNIQUE,
grade int NOT NULL,
email VARCHAR(20) NOT NULL,
mess VARCHAR(250)
)";

if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


	?>


 
 </div>
</body>
</html>