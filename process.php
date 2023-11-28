<?php 

    session_start();

    $filename = "users.txt";
    $username = $_POST['name'] ?? null;
    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;
    $password_confirm = $_POST['password_confirm'] ?? null;
    $day = $_POST['day'] ?? null;
    $month = $_POST['month'] ?? null;

    if(isset($username)){
        if($password !== $password_confirm){
            $_SESSION['message'] = "Пароли не совпадают";
            header('Location: /register.php');
            exit();
        }
        if(existsUser($login, $filename)){
            $_SESSION['message'] = "Данный логин уже занят, придумайте другой";
            header('Location: /register.php');
            exit();
        }
        $str = "name: $username; login: $login; password: " . sha1($password) .";;";
        file_put_contents($filename, $str, FILE_APPEND);
        header('Location: /login.php');
    }else{
        if(checkPassword($login, $password, $filename)){
            $_SESSION['name'] = getCurrentUser($login, $password, $filename);
            $_SESSION['date'] = date("Y-m-d H:i:s", time());
            header('Location: /index.php');
        }else{
            $_SESSION['message'] = "Пользователь не найден. Проверьте введённые данные";
            header('Location: /login.php');
        }
    }
    if(isset($day) && isset($month))
    {
        $interval = date_diff(date_create(date("Y-m-d", time())), date_create(date("Y", time()) . "-$month-$day"));
        $tmp = $interval->format('%R');
        $days = date('L') ? 366 : 365;
        if($tmp == '-'){
            $_SESSION["days"] = $days - $interval->format('%a');
        }else{
            $_SESSION["days"] = $interval->format('%a');
        }
    }

    function getUsersList($filename) {
        $res = [[], []];
        $str = file_get_contents($filename);
        $arr = explode(";;", $str);
        $count = 0;
        foreach ($arr as $item) {
            if($item == ""){
                continue;
            }
            $item = explode("; ", $item);
            foreach ($item as $instance) {
                $instance = explode(": ", $instance);
                $res[$count][$instance[0]] = $instance[1];
            }
            $count++;
        }
        return $res;
    }

    function existsUser($login, $filename) {
        $arr = getUsersList($filename);
        foreach ($arr as $item) {
            if($item['login'] === $login)
                return $item;
        }
        return null;
    }

    function checkPassword($login, $password, $filename) {
        $user = existsUser($login, $filename);
        if(isset($user)){
            if(sha1($password) == $user['password']){
                return true;
            }
        }
        return false;
    }

    function getCurrentUser($login, $password, $filename) {
        if(checkPassword($login, $password, $filename)){
            $user = existsUser($login, $filename);
            return $user['name'];
        }
        return null;
    }
