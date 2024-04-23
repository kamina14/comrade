<?php
  $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));  
  $city1 = trim(filter_var($_POST['city1'], FILTER_SANITIZE_STRING));
  $city2 = trim(filter_var($_POST['city2'], FILTER_SANITIZE_STRING));
  $cost = trim(filter_var($_POST['cost'], FILTER_VALIDATE_INT));
  $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

    $error = '';
    if(strlen($title) <= 3)
        $error = 'Тауар түрін еңгізіңіз';
    else if(strlen($city1) <= 3)
        $error = 'Жіберу орынын еңгізіңіз';
    else if(strlen($city2) <= 3)
        $error = 'Қабылдау орынын еңгізіңіз';
    else if ($cost === false || $cost === null)
        $error = 'Ошибка ввода цены. Убедитесь, что введено целое число.';
    else if(strlen($text) <= 20)
        $error = 'Толығырақ мәлімет еңгізіңіз';

    if($error != '') {
        echo $error;
        exit();
    }

    require_once'../mysql_connect.php';
    
    $sql = 'INSERT INTO articles(title, city1, city2, cost, text, date, avtor) VALUES(?, ?, ?, ?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$title, $city1, $city2, $cost, $text, time(), $_COOKIE['login']]);

    echo 'Бәрі дұрыс';

?>