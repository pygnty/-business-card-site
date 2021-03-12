<?php
$mysql = mysqli_connect(
  'localhost',  /* Хост, к которому мы подключаемся */
  'root',       /* Имя пользователя */
  'root',   /* Используемый пароль */
  'kabashko');//Имя бд
if (!$mysql) {
  printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
  exit;
}

$login = $_POST['login'];
$password = $_POST['password'];

//Записываем в таблицу users значения логина и пароля
$query = "INSERT INTO users (login, password) VALUES ('$login', '$password');";
$result = mysqli_query($mysql, $query);

if (!mysqli_error($mysql)){
  $str = urlencode("Вы зарегестрированы");
  mysqli_close($mysql); 
  header("Location: login.php?str=${str}"); 
} else{
  $str = urlencode("Такой пользователь уже существует. Введите, пожалуйста, другой логин");
  mysqli_close($mysql);  
  header("Location: login.php?str=${str}"); 
}

?>