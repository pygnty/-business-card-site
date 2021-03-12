<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
  </head>
  <body >
  <?php
  if (isset($_GET['str'])){
    $str=$_GET['str'];
    echo "
    <script>
    alert(`${str}`);
    window.location.replace('admin.php');
    </script>";
  } 
?>
    <header>
      <div id="logo">DIGITAL</div>
      <div id="home"><a href="index.php">Главная</a></div>
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
    <div>
      <form class="form" onsubmit="return isEmptyAdmin()" name="service"  action="admin_add.php" method="POST">
        <p>Добавить новую услугу</p>
        <input class="input_reg" type="text" autocomplete="off" name='foto' placeholder='Путь к фото'><br>
        <input class="input_reg" type="text" autocomplete="off" name='name' placeholder='Название'><br>
        <input class="input_reg" type="text" autocomplete="off" name='price' placeholder='Цена'><br>
        <input class="input_reg" type="text" autocomplete="off" name='info' placeholder='Описание'><br>
        <button type='submit' class="input_reg">Добавить</button>
      </form>
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