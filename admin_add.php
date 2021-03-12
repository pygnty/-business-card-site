<?php
$mysql = mysqli_connect(
  'localhost',  /* Хост, к которому мы подключаемся */
  'root',       /* Имя пользователя */
  '',   /* Используемый пароль */
  'kabashko');//Имя бд
if (!$mysql) {
  printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
  exit;
}

$foto = $_POST['foto'];
$name = $_POST['name'];
$price = $_POST['price'];
$info = $_POST['info'];

$query = "INSERT INTO services (img, name, price, information) VALUES ('$foto', '$name', '$price', '$info');";
$result = mysqli_query($mysql, $query);

if (!mysqli_error($mysql)){
  $str = urlencode("Услуга ${name} успешно добавлена");
  mysqli_close($mysql); 
  header("Location: admin.php?str=${str}"); 
} else{
  $str = urlencode("Что-то пошло не так((");
  mysqli_close($mysql);  
  header("Location: admin.php?str=${str}"); 
}


?>
