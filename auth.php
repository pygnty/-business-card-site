<?php
$mysql = mysqli_connect(
  'localhost',  /* Хост, к которому мы подключаемся */
  'root',       /* Имя пользователя */
  '',   /* Используемый пароль */
  'kabashko'); //Имя бд
if (!$mysql) {
  printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
  exit;
}

$login = $_POST['log'];
$password = $_POST['pass'];

//Получаем из таблицы `users` значения логина и пароля
$query = mysqli_query($mysql, "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'");
$user = mysqli_fetch_assoc($query);
if (count($user) == 0){
  $str = urlencode("Такой пользователь не был найден. Проверьте, пожалуйста, свой логин и пароль");
  mysqli_close($mysql);  
  header("Location: login.php?str=${str}"); 
} else{
  //Записываем в куки логин
  //Куки - это фрагмент данных, который храниться на компьюторе пользователя
  //Используем для входа в систему, чтоб иметь доступ к логину пользователя и знать кто зашел
  //Даем время жизни - 1 день: time() + 3600*24
  //Куки доступны даже после закрытия браузера или страницы
  setcookie('login', $user['login'], time() + 3600*24, "/");
  setcookie('admin', $user['admin'], time() + 3600*24, "/");
  mysqli_close($mysql);
  header("Location: index.php?str=${str}");

}

?>
