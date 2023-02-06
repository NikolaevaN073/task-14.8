<?php

unset($_SESSION['login']);
$_SESSION['auth'] = false; 
unset($_COOKIE['username']);
setcookie('username', null, -1, '/');
unset($_COOKIE['password']);
setcookie('password', null, -1, '/');
header('Location: index.php'); 
