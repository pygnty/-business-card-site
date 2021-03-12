<?php
$mysql = mysqli_connect(
  'localhost',  /* Хост, к которому мы подключаемся */
  'root',       /* Имя пользователя */
  'root',   /* Используемый пароль */
  'kabashko'); //Имя бд
if (!$mysql) {
  printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
  exit;
}

$id_service = $_POST['id_service'];
$login = $_COOKIE['login'];
$comment = $_POST['comment'];
$date = date("Y-m-d"); 

//Добавляем комментарий в бд
$query = "INSERT INTO comments (id_service, date, login_comment, comment) VALUES ('$id_service', '$date', '$login', '$comment');";
$result = mysqli_query($mysql, $query);


mysqli_close($mysql);  
header("Location: service.php?id='${id_service}'"); 




?>