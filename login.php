<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
  </head>
  <body id="body_login">
  <?php
  if (isset($_GET['str'])){
    $str=$_GET['str'];
    echo "
    <script>
    alert(`${str}`);
    window.location.replace('login.php');
    </script>";
  } 
?>
    <header>
      <div id="logo">DIGITAL</div>
      <div id="home"><a href="index.php">Главная</a></div>
      <div id="service"><a href="services.php">Услуги </a></div>
      <div id="log"><a href="#">Войти</a></div>
    </header>
    <div class="form_div">
    <form class="form" onsubmit="return isEmptyReg()" name="reg" action="check.php" method="POST">
      <p>Зарегестрироваться</p>
      <input class="input_reg" minlength='3' maxlength='90' name="login" type="text" autocomplete="off" placeholder="login">
      <input class="input_reg" minlength='3' maxlength='90' name="password" type="password" autocomplete="off" placeholder="password">
      <button class="input_reg"  type="submit">Зарегестрироваться</button><br>
    </form>
    <form class="form" name="auth" action="auth.php" method="POST">
      <p>Войти</p>
      <input class="input_reg" minlength='3' maxlength='90' name="log" type="text" autocomplete="off" placeholder="login">
      <input class="input_reg" minlength='3' maxlength='90' name="pass" type="password" autocomplete="off" placeholder="password">
      <button class="input_reg"  type="submit">Войти</button><br>
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