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

    $newUserLogin = trim($_POST['login']) ?? null;
    $password = trim($_POST['password']) ?? null;

    if (null !== $newUserLogin || null !== $password) {
    
        if (null !== existsUser($newUserLogin)) { 
            $error = 'Такой пользователь существует';        
        } else {
            $data = 'data.php';           
            $current = file_get_contents($data); 
            $newUserPassword = sha1($password);    
            $current = substr($current,0,strlen($current)-2)."['login' => '".$newUserLogin."', 'password' => '".$newUserPassword."'], ".PHP_EOL ."];";        
            file_put_contents($data, $current); 

            $entryTime = date("Y-m-d H:i:s"); 
            setcookie('entryTime', $entryTime, time() + 86400, '/');            
            header("Location: login.php");          
        }  
    }
}?>
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
                <form action="registr.php" method="POST">
                    <h4>Регистрация</h4>                       
                    <input name="login" type="text" placeholder="Логин" required><br>                        
                    <input name="password" type="password" placeholder="Пароль" required><br>
                    <input name="signIn" type="submit" class="btn-secondary" value="Отправить">
                </form>
            </div>                
        </div> 
    </section>            
    <?php 
        require 'footer.php';        
    ?>
</body>
</html>