<?php 
    session_start();
    if(isset($_SESSION['name'])){
        header('Location: /index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="reg">
    <form class="reg_form" action="process.php" method="post">
        <label>Имя</label>
        <input name="name" type="text" placeholder="Введите своё имя">
        <label>Логин</label>
        <input name="login" type="text" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input name="password" type="password" placeholder="Введите свой пароль">
        <label>Подтверждение пароля</label>
        <input name="password_confirm" type="password" placeholder="Введите пароль ещё раз">
        <input name="submit" type="submit" value="Зарегистрироваться">
        <p>
            У вас уже есть аккаунта? - <a href="/login.php">авторизируйтесь</a>!
        </p>
        <?php 
            if(isset($_SESSION['message'])){
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>