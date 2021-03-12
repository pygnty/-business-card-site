<?php
    setcookie('login', $user['login'], time() - 3600*24, "/");
    setcookie('admin', $user['admin'], time() - 3600*24, "/");
    header("Location: index.php");
?>