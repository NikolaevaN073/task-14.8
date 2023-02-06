<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty&Spa</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<?php

$error = '';
if (!empty($_POST)) {
    
    require 'functions.php';
    $username = trim($_POST['login']) ?? null;
    $password = trim($_POST['password']) ?? null; 

    if (null !== $username || null !== $password) {
        $password = sha1($password);

        if (null !== existsUser($username)) {

            if (checkPassword($username, $password)) {                   
                session_start(); 
                $_SESSION['auth'] = true;       
                $_SESSION['login'] = $username; 
                $auth = $_SESSION['auth'] ?? null;                

                setcookie('username', $username, 0, '/');
                setcookie('password', $password, 0, '/');  
                                                         
                header('Location: index.php');                  
            } else {
                return $error = 'Неверный пароль'; 
            }
        } else {
            return $error = 'Неверный логин';   
        }                 
    }
}
?>
<html>
<body>
    <?php        
        require 'header.php';            
    ?>    
    <section class="login-wrapper">
        <div class="login-content">
            <div class="frame">
                <?php if ($error) { ?>
                    <p><span><?= $error ?></span></p>
                    <?php } ?>  
                <form action="login.php" method="POST">
                    <h4>Авторизация</h4>                       
                    <input name="login" type="text" placeholder="Логин" required><br>                        
                    <input name="password" type="password" placeholder="Пароль" required><br>
                    <input name="signIn" type="submit" class="btn-secondary" value="Войти">
                    <a href="registr.php">Зарегистрироваться</a>                                       
                </form>
            </div>                
        </div> 
    </section>            
    <?php 
        require 'footer.php';        
    ?>
</body>
</html>