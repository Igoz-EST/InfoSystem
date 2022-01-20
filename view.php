<?php

$link = mysqli_connect("localhost", "root", "", "eks");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "Select * from Students";



$otvet = mysqli_query($link, $sql);
    

$row = mysqli_fetch_all($otvet, MYSQLI_ASSOC);


// Close connection
mysqli_close($link);




?>

<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

<h2>Содержимое таблицы students</h2>


<table style="width:100%">
  <tr>
    <th>id</th>
    <th>Lastname</th> 
    <th>Firstname</th>
    <th>Isik</th>
    <th>Grade</th>
    <th>Email</th>
    <th>Mess</th>
  </tr>
  <?php foreach($row as $value){?>

<tr>
<td><?php echo $value['id']?></td>    
<td><?php echo $value['first_name']?></td>
<td><?php echo $value['last_name']?></td>
<td><?php echo $value['isik']?></td>
<td><?php echo $value['grade']?></td>
<td><?php echo $value['email']?></td>
<td><?php echo $value['mess']?></td>
</tr>
<?php  } ?>
  

</table>



<form>
<input type="button" onClick="document.location.href='del.php'" value="delete">
  </form>

  <form>
<input type="button" onClick="document.location.href='add.php'" value="Form">
  </form>
</body>
</html>
