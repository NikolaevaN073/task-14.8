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

<body>
    <?php
        require 'header.php';      
        if (!empty($_POST)) {
            require 'functions.php'; 
            $currentUser = getCurrentUser();   
        }
    ?>
    <main>        
        <div class="main-content">
            <?php if ($currentUser && getUserBirthday($currentUser) === null) {                
                require 'userBirthday.php';                                         
                } elseif ($currentUser && null !== getUserBirthday($currentUser)) {
                    $birthday = getDaysToBirthday();
                    if ($birthday === 'today') { ?>
                        <div class="promo-title" id="promo">
                            <h4>Поздравляем с Днем рожденья!</h4>
                            <p class="main-phrase" style="text-align: center;">
                                В честь Вашего Дня рожденья дарим скидку 5% на любые услуги СПА - центра!
                            </p>
                        </div>
                    <?php }               
                }
            ?>
            <img src="images/main.jpg" alt="">
            <div class="title-main">
                <div class="frame">
                    <h2>Профессиональный </h2>
                    <h2>СПА-центр</h2>
                    <?php require 'promo.php';
                        if ($currentUser && $timer) { ?>
                        <div class="text-block">  
                            <p class="main-phrase">Действует специальная акция!</p>
                            <p class="main-phrase">До окончания акции осталось: <span id="timer"></span><span id="specialPromo"><?=$entryTime?></span></p> 
                        </div>  
                        <a href="#"><button class="btn-secondary">Подробнее</button></a>
                        <?php } else { ?>
                        <div class="text-block">                        
                            <p class="main-phrase">Окунитесь в мир релакса!</p>
                            <p class="main-phrase">Узать о наших услугах:</p>                        
                        </div>
                        <div class="button-block">
                            <a href="/#services"><button class="btn-main">Подробнее</button></a>
                        </div>
                    <?php } ?>                    
                </div>
            </div>
        </div>
        <div class="card-content" id="services">
            <div class="card-left">
                <div class="card-img">
                    <img src="images/massage.jpg" alt="">
                </div>
                <div class="card-text">
                    <h4>Массаж</h4>
                    <ul>
                        <li>Общий массаж</li>
                        <li>Шейно-воротниковая зона</li>
                        <li>Массаж спины</li>
                        <li>Массаж ног</li>
                    </ul>
                </div>
            </div>
            <div class="card-right">
                <div class="card-text">
                    <h4>Косметология</h4>
                    <ul>
                        <li>
                            <p><span>Миндальный рай: </span></p>
                            <p>Массаж лица + Миндальный пилинг + Альгинатная маска</p>
                        </li>
                        <li>
                            <p><span>Испанская ночь: </span></p>
                            <p>Испанский массаж лица + Пилинг + Увлажняющая маска</p>
                        </li>
                        <li>
                            <p><span>Спа-ритуал: </span></p>
                            <p>Успокаивающий массаж + Легкий пилинг + Питательная маска</p>
                        </li>
                    </ul>
                </div>
                <div class="card-img">
                    <img src="images/cosmetology.jpg" alt="">
                </div>
            </div>
            <div class="card-left">
                <div class="card-img">
                    <img src="images/spa.jpg" alt="">
                </div>
                <div class="card-text">
                    <h4>Спа-программы</h4>
                    <ul>
                        <li>Стоунтерапия</li>
                        <li>Антистресс</li>
                        <li>Детокс</li>
                        <li>Релакс</li>
                    </ul>
                </div>
            </div>
            <div class="card-right">
                <div class="card-text">
                    <h4>Бьюти-процедуры</h4>
                    <ul>
                        <li>Шоколадное обертывание</li>
                        <li>Медовый массаж</li>
                        <li>Антицеллюлитная программа</li>
                        <li>Средиземноморский пилинг</li>
                    </ul>
                </div>
                <div class="card-img">
                    <img src="images/beauty.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="promo-title" id="promo">
            <h4>Актуальные акции</h4>
        </div>
        <div class="promo-content">            
            <div class="promo-card">
                <div class="promo-img">
                    <img src="images/promoSPA.jpg" alt="">                    
                </div>
                <div class="promo-text">
                    <p>* Скидка на второй спа-ритуал при первом посещении спа-центра</p>
                </div>
                <div class="promo-int">
                    -50%
                </div>
            </div>
            <div class="promo-card">
                <div class="promo-img">
                    <img src="images/promoDR.jpg" alt="">                    
                </div>
                <div class="promo-text">
                    <p>* На бьюти-процедуры каждое 15 число месяца</p>
                </div>
                <div class="promo-int">
                    -15%
                </div>
            </div>
            <div class="promo-card">
                <div class="promo-img">
                    <img src="images/promoMas.jpg" alt="">                    
                </div>
                <div class="promo-text">
                    <p>* Скидка на любой массаж при покупке абонемента от 5 сеансов</p> 
                </div>
                <div class="promo-int">
                    -20%
                </div>
            </div>
        </div>
        <div class="gallery" id="gallery">
            <img src="images/photo1.jpg" alt="">
            <img src="images/photo5.jpg" alt="">
            <img src="images/photo6.jpg" alt="">
            <img src="images/photo4.jpg" alt="">
            <img src="images/photo2.jpg" alt="">
            <img src="images/photo3.jpg" alt="">
        </div>
        <div class="contacts" id="contacts">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1402.471438647701!2d48.56409922499002!3d54.359625820365125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415d38d3e2c22547%3A0x4ea28c51ac4a52d0!2z0KHQvtC30LjQtNCw0YLQtdC70Yw!5e0!3m2!1sru!2sru!4v1674307392146!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="info">
                <div class="contacts-info">
                    <h4>Контакты:</h4>
                    <p><span>Телефон: </span> +7 (999) 987 65 43</p>
                    <p><span>Адрес: </span>г.Ульяновск, пр.Созидателей, 118А </p>
                    <p><span>Электронная почта: </span>beautyspa@example.com</p>
                </div>
                <div class="time-info">
                    <h4>Врема работы спа-центра:</h4>
                    <p>Ежедневно с 8.00 до 22.00</p>
                </div>
                
            </div>
        </div>
    </main>
    <?php
        require 'footer.php';
    ?>
<script src="promo.js"></script>
</body>
</html>
