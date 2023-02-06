<?php 
    require 'functions.php'; 
    $currentUser = getCurrentUser();
?>
<html>
<body>
    <header>
        <div class="head-content">
            <div class="logo">
                <a href="/index.php"><img src="images/logo.png" alt="Логотип"></a>                
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="/#services" class="btn-mini">Услуги</a> 
                    </li>
                    <li>
                        <a href="/#promo" class="btn-mini">Акции</a> 
                    </li>
                    <li>
                        <a href="/#gallery" class="btn-mini">Фото</a> 
                    </li>
                    <li>
                        <a href="/#contacts" class="btn-mini">Контакты</a> 
                    </li>                
                </ul>
            </div>
            <div class="login">                
                <div class="sign-in">
                    <?php                                        
                    if (!$currentUser) { ?>
                        <a href="login.php">| Войти</a>
                    <?php } else { ?>
                        <p>Здравствуйте, <?= $currentUser ?>
                        <a href="logout.php">| Выйти</a></p>
                    <?php } ?>                   
                    <?php if ($currentUser && null !== getUserBirthday($currentUser)) {
                        $birthday = getDaysToBirthday();
                        if ($birthday === 'today') {
                            echo 'Сегодня День рожденья!';
                        } else {                        
                    ?>
                        <p>До дня рожденья <span>
                    <?php                     
                        if ($birthday % 100 === 1) {
                            echo $birthday . ' день';
                        } elseif ($birthday % 100 < 5) {
                            echo $birthday . ' дня';
                        } else {
                            echo $birthday . ' дней';
                        }
                    }                    
                    ?></span></p>
                <?php } ?>                    
                </div>
                <div class="phone">+7 (999) 987 65 43</div>
            </div>
        </div> 
    </header>
</body>
</html>
 