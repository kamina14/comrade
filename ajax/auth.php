<?php
  $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';
    if (strlen($login) <= 3) {
        $error = 'Логин еңгізіңіз';
    } else if (strlen($pass) <= 3) {
        $error = 'Құпиясөз еңгізіңіз';
    }
    if($error != '') {
        echo $error;
        exit();
    }

    $hach = "asdfghj123654asdf";
    $pass = md5($pass . $hach);

    require_once'../mysql_connect.php';

    $sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass';
    $query = $pdo->prepare($sql);
    $query->execute(['login' => $login, 'pass' => $pass]);

    $user = $query->fetch(PDO::FETCH_OBJ);
    if($user->id == 0)
        echo 'Мұндай қолданушы жоқ';
    else {
        setcookie('login', $login, time() + 3600 * 24 * 30, "/");
        echo 'Бәрі дұрыс';
    }
    

?>