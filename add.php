<html>

<link rel="stylesheet" href="add.css">
  <head>
    <title>Lesson</title>
  </head>

<body>
 <div>
	<?php
  
  $first_name = "";
    $last_name = "";
    $isik = "";
    $grade = "";
    $email = "";
    $mess = "";
    
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $isik = $_POST["isik"];
    $grade = $_POST["grade"];
    $email = $_POST["email"];
    $mess = $_POST["mess"];
  }

	?>
 
 </div>

<form action="add.php" method="post">
<p>имя: <input type="text" name="first_name" /></p>
<p>фамилия: <input type="text" name="last_name" /></p>
<p>личный код: <input type="text" name="isik" /></p>
<p>курс: <input type="text" name="grade" /></p>
<p>email: <input type="text" name="email" /></p>
<p>сообщение: <input type="text" name="mess" /></p>
<p><input type="submit" />
<input type="reset" value="cancel"></p>
<p><input type="button" onClick="document.location.href='view.php'" value="View"></p>
</form>

<?php

function low($str){

  $str = ucwords(strtolower($str));
   
}

$flag = 0;

/*if($first_name == null){

  echo "Введите имя<br>";
  
}*/

if(isset($first_name) && $reg = preg_match('/^[а-яА-ЯЄєІіa-zA-Z]+$/u', $first_name)){ /////////// First name

if(strlen($first_name)>30)
{
  echo "Слишком длинное имя<br>";
  
}else{$flag++;

  $first_name = ucwords(strtolower($first_name));

}
  
}else{echo "Введите Имя<br>";}

/*if($last_name == null){

  echo "Введите Фамилию<br>";
  
}*/

if(isset($last_name) && $reg1 = preg_match('/^[а-яА-ЯЄєІіa-zA-Z]+$/u', $last_name)){ ////////// Last name

  if(strlen($last_name)>30)
  {
    echo "Слишком длинная фамилия<br>";                 
    
  }else{$flag++;
  $last_name = ucwords(strtolower($last_name));
}

}else{echo "Введите Фамилию<br>";}


if(isset($isik)){     //////////////// isikukod

  $intisik = (int)$isik;

  if(strlen($intisik) >11){

    echo "Введите корректный личный код<br>";            
    
  }elseif(strlen($intisik) <11){

    echo "Введите корректный личный код<br>";
    
  }
  else{$flag++;}

}


if(isset($grade)){       ///////// Grade

  if($grade > 3 || $grade <1){

    echo "Введите курс(1-3)<br>";
    
  }else{$flag++;}

}

if(isset($email)){            /////////////////////////////Email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
 // echo "Адрес указан корректно.<br>";
 $flag++;
 $email = ucwords(strtolower($email));
}else{
  echo "Адрес указан не правильно.<br>";
  
}
}

if($flag == 5){

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "eks");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO students (id, last_name, first_name, isik, grade, email, mess) VALUES ('', '$last_name', '$first_name', '$isik', '$grade', '$email', '$mess')";
if(mysqli_query($link, $sql)){
    echo "$first_name.$last_name.Успешно добавлен в базу данных!";
     
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


}else{
  echo "Анкета заполнена неверно";
 
}

?>

</body>
</html>