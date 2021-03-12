<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
  </head>
  <body id="body_index">
    <header>
      <div id="logo">DIGITAL</div>
      <div id="home"><a href="#">Главная</a></div>
      <div id="service"><a href="services.php">Услуги </a></div>
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

    <div id="center">
      <div id="information">
        <h1 class="info">DIGITAL агенство</h1>
        <p class="info">Идея. Решение. Результат</p>
        <hr id="hr" class="info" noshade="">
        <h2 class="info">Команда разработчиков</h2>
        <p class="info">Любим работу. Ценим клиентов. Заинтересованы в проекте</p>
        <h2 class="info">Наша миссия</h2>
        <p class="info">Пропагандировать новый творческий подход к разработке и продвижению сайтов </p>
        <h2 class="info">Наша цель</h2>
        <p class="info">Разработка прогресивной концепции создания сайтов на основе эффектного и эффективного дизайна и удобного юзабилити.</p>
      </div>
      <div id="foto">
        <img id="img_desktop" src="./img/1.png">
      </div>
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