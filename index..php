<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPA-салон</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="header">
                <?php 
                if(!isset($_SESSION['name'])){
                    echo '<a class="login_reg" href="login.php">Вход/Регистрация</a>';
                }else{
                    echo '<h3>Добро пожаловать ' . $_SESSION['name'] . '</h3>';
                    echo '<a class="exit" href="logout.php">Выход</a>';
                }
                ?>
        </header>
    </div>

    <section>
        <div class="container">
            <?php 
                if(isset($_SESSION['name'])){
            ?>
            <h3>Укажите дату рождения: </h3>
            <form action="process.php" method="post">
                <label>День</label>
                <input name="day" type="text" placeholder="Введите день">
                <label>Месяц</label>
                <select name="month">
                    <option value="01">Январь</option>
                    <option value="02">Февраль</option>
                    <option value="03">Март</option>
                    <option value="04">Апрель</option>
                    <option value="05">Май</option>
                    <option value="06">Июнь</option>
                    <option value="07">Июль</option>
                    <option value="08">Август</option>
                    <option value="09">Сентябрь</option>
                    <option value="10">Октябрь</option>
                    <option value="11">Ноябрь</option>
                    <option value="12">Декабрь</option>
                </select>
                <input name="submit" type="submit" value="Проверить">
            </form>
            <?php 
                }
                if(isset($_SESSION["days"])){
                    if($_SESSION["days"] == 0){
                        echo '<h3>Поздравляем вас С Днём Рождения и дарим вам скидку 5% на все услуги</h3>';
                    }else{
                        echo '<h3>До вашего дня рождения осталось ' . $_SESSION['days'] .  ' дней</h3>';
                    }
                }
                if(isset($_SESSION['name'])){
                    $midnight = date("Y-m-d 00:00:00", strtotime('+ 1 day' . $_SESSION['date']));
                    $interval = date_create($midnight)->diff(date_create(date("Y-m-d H:i:s", time())));

                    echo "<h3> До истечения персональной скидки осталось: " . $interval->format("%h") . " ч. " . $interval->format("%i") . " мин. " . $interval->format("%s") . " сек.</h3>";
                }
            ?>
            <img class="title_img" src="img/DSCF6390_1.jpg" alt="">
            <div class="section">
                <a class="category" href="#">
                    <img class="category_img" src="img/122238.jpg" alt="">
                    <h4 class="category_title">
                        SPA Стройность
                    </h4>
                    <p class="category_text">
                        Программа, в задачи которой входит пробуждение красоты тела и заряд физической энергии.
                    </p>
                    <p class="duration">Длительность - 2 часа</p>
                    <?php 
                        if(isset($_SESSION['days']) && $_SESSION['days'] == 0){
                            echo '<p class="cost">Стоимость - <s>3790</s> &#8381 <span>3600 &#8381</span></p>';
                        }else{
                            echo '<p class="cost">Стоимость - 3790 &#8381</p>';
                        }
                    ?>
                    <button class="more_detail">Подробнее</button>
                    <button class="sign_up">Записаться</button>
                </a>
                <a class="category" href="#">
                    <img class="category_img" src="img/22-644x427.jpg" alt="">
                    <h4 class="category_title">
                        SPA Шоколад
                    </h4>
                    <p class="category_text">
                        Для тех, кто ценит толк в "сладкой жизни".
                    </p>
                    <p class="duration">Длительность - 2 часа</p>
                    <?php 
                        if(isset($_SESSION['days']) && $_SESSION['days'] == 0){
                            echo '<p class="cost">Стоимость - <s>3890</s> &#8381 <span>3695 &#8381</span></p>';
                        }else{
                            echo '<p class="cost">Стоимость - 3890 &#8381</p>';
                        }
                    ?>
                    <button class="more_detail">Подробнее</button>
                    <button class="sign_up">Записаться</button>
                </a>
                <a class="category" href="#">
                    <img class="category_img" src="img/2818163709348413.jpg" alt="">
                    <h4 class="category_title">
                        SPA Белый лотос
                    </h4>
                    <p class="category_text">
                        Вдохновляющая Spa программа на линейке топовых материалов с ароматом и пользой цветков королевского лотоса!
                    </p>
                    <p class="duration">Длительность - 2 часа</p>
                    <?php 
                        if(isset($_SESSION['days']) && $_SESSION['days'] == 0){
                            echo '<p class="cost">Стоимость - <s>3890</s> &#8381 <span>3695 &#8381</span></p>';
                        }else{
                            echo '<p class="cost">Стоимость - 3890 &#8381</p>';
                        }
                    ?>
                    <button class="more_detail">Подробнее</button>
                    <button class="sign_up">Записаться</button>
                </a>
                <a class="category" href="#">
                    <img class="category_img" src="img/abba_jpg_1318325044.jpg" alt="">
                    <h4 class="category_title">
                        SPA Релаксация
                    </h4>
                    <p class="category_text">
                        Самая универсальная Spa программа, которая подходит всем. <br> Если не знаете, что выбрать, это ваш вариант.
                    </p>
                    <p class="duration">Длительность - 2 часа</p>
                    <?php 
                        if(isset($_SESSION['days']) && $_SESSION['days'] == 0){
                            echo '<p class="cost">Стоимость - <s>3790</s> &#8381 <span>3600 &#8381</span></p>';
                        }else{
                            echo '<p class="cost">Стоимость - 3790 &#8381</p>';
                        }
                    ?>
                    <button class="more_detail">Подробнее</button>
                    <button class="sign_up">Записаться</button>
                </a>
                <a class="category" href="#">
                    <img class="category_img" src="img/large_06830357-2AAC-4F9C-B3CD-C2ACF4504545.jpeg" alt="">
                    <h4 class="category_title">
                        SPA Мерцающее Золото
                    </h4>
                    <p class="category_text">
                        Роскошная Spa программа с золотой слюдой.
                    </p>
                    <p class="duration">Длительность - 2 часа</p>
                    <?php 
                        if(isset($_SESSION['days']) && $_SESSION['days'] == 0){
                            echo '<p class="cost">Стоимость - <s>4250</s> &#8381 <span>4037 &#8381</span></p>';
                        }else{
                            echo '<p class="cost">Стоимость - 4250 &#8381</p>';
                        }
                    ?>
                    <button class="more_detail">Подробнее</button>
                    <button class="sign_up">Записаться</button>
                </a>
                <a class="category" href="#">
                    <img class="category_img" src="img/Spa-in-Miami-The-Setai-photo-03.jpg" alt="">
                    <h4 class="category_title">
                        SPA Роял Манго
                    </h4>
                    <p class="category_text">
                        Тропический комплекс для абсолютного восстановления
                    </p>
                    <p class="duration">Длительность - 2 часа</p>
                    <?php 
                        if(isset($_SESSION['days']) && $_SESSION['days'] == 0){
                            echo '<p class="cost">Стоимость - <s>3890</s> &#8381 <span>3695 &#8381</span></p>';
                        }else{
                            echo '<p class="cost">Стоимость - 3890 &#8381</p>';
                        }
                    ?>
                    <button class="more_detail">Подробнее</button>
                    <button class="sign_up">Записаться</button>

                </a>
            </div>
        </div>
    </section>
</body>
</html>