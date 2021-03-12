<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
  </head>
  <body class='body_service'>
    <header>
      <div id="logo">DIGITAL</div>
      <div id="home"><a href="index.php">Главная</a></div>
      <div id="service"><a href="services.php">Услуги</a></div>
      <?php
      if($_COOKIE['login']) {
        echo "
        <div id='log'><a href='exit.php'>Выйти</a></div>
        ";
      } else {
        echo "
        <div id='log'><a href='login.php'>Войти</a></div>
        ";
      }

      ?>
    </header>

    <div class='main_div_service'>




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

$id = $_GET['id'];

$query1 = mysqli_query($mysql, "SELECT * FROM `services` WHERE `id` = $id");
if($query1) {
  while($row = mysqli_fetch_assoc($query1)) {//Извлекает результирующий ряд в виде ассоциативного массива
    $id = $row['id'];
    $img = $row['img'];
    $name = $row['name'];
    $price = $row['price'];
    $information = $row['information'];
    
    echo "
      <h1 class='service_h1_info'>${name}</h1>
      <div class='service_div_info'>
        <div class='service_img_info'><img src='${img}'></div>
        <p class='service_p_info'>${information}</p>
        <p class='service_p_info'><i>${price} $</i></p></a>
      </div>
      
    ";
  }
}

echo "

<div class='comments'>
<hr>
  <div class='service_div_comments_form'>
    <h2 class='comment_h2'>Комментарии</h1>
";
if($_COOKIE['login']){
  echo"
  <form name='comments' onsubmit='return isEmptyComment()' action='comments.php' method='POST'>
  <input name='id_service' type='hidden' value='${id}'>
  <p class='form_comment_p'>Оставьте здесь свой комментарий</p>
  <input class='comment_input' minlength='1' name='comment' type='text' autocomplete='off' placeholder='Комментарий'>
  <button class='button_comment' type='submit'>Добавить комментарий</button>
  </form>
  ";
} else {
  echo "
  <p class='form_comment_p'>Для того, чтоб оставить комментарий, войдите в систему</p>
  ";
}
echo "
</div>
<div class='service_div_comments'>
";

$query2 = mysqli_query($mysql, "SELECT * FROM `comments` WHERE `id_service` = $id ORDER BY id DESC");
if($query2) {
  while($row = mysqli_fetch_assoc($query2)) {//Извлекает результирующий ряд в виде ассоциативного массива
    $date = $row['date'];
    $login_comment= $row['login_comment'];
    $comment = $row['comment'];
    echo "
    <div class='div_comment'>
      <p class='login_comment comment_p'>${login_comment}</p>
      <p class='comment comment_p'>${comment}</p>
      <p class='date_comment comment_p'>${date}</p>
    </div>
    ";
  }

} else {
  echo 1;
  echo "
    <p>Комментариев пока нет</p>
  ";
}

echo "</div></div>";


mysqli_close($mysql);  
?>
</div>

<footer>
      <h1>Contact</h1><br>
      <p>Instagram: @######</p>
      <p>Telegram: +390#########</p>
      <p>Viber: +390#########</p>
      <p>Gmail: gmail@gmail.com</p>
      <?php
      if($_COOKIE['admin'] == 1){
        echo"<a class='admin_href' href='admin.php'>Админ</a>";
      }
      ?> 
    </footer>
  <script src="index.js"></script>

  </body>
</html>