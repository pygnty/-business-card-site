<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
  </head>
  <body class='body_services'>
    <header>
      <div id="logo">DIGITAL</div>
      <div id="home"><a href="index.php">Главная</a></div>
      <div id="service"><a href="#">Услуги</a></div>
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
    <div class='main_div'>
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

    $query = mysqli_query($mysql, "SELECT * FROM `services`");
    if($query) {
      while($row = mysqli_fetch_assoc($query)) {//Извлекает результирующий ряд в виде ассоциативного массива
        $id = $row['id'];
        $img = $row['img'];
        $name = $row['name'];
        $price = $row['price'];
        
        echo "
          <div class='service_div'><a class='service_a' href='service.php?id=${id}'>
            <img class='service_img' src='${img}'>
            <p class='service_p'>${name}</p>
            <p class='service_p price'><i>${price} $</i></p></a>
          </div>
        ";
      }
    }


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
  </body>
</html>