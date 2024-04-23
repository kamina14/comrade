<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));  
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
$role = $_POST['role']; // Получаем значение поля "role"

$error = '';
if(strlen($username) <= 3)
    $error = 'Атыңызды жазыңыз';
else if(strlen($email) <= 3)
    $error = 'Email еңгізіңіз';
else if(strlen($login) <= 3)
    $error = 'Логин еңгізіңіз';
else if(strlen($pass) <= 3)
    $error = 'Құпиясөз еңгізіңіз';
else if($role != 'user' && $role != 'driver') // Проверяем, что значение "role" является допустимым
    $error = 'Недопустимая роль';

if($error != '') {
    echo $error;
    exit();
}

$hach = "asdfghj123654asdf";
$pass = md5($pass . $hach);

require_once '../mysql_connect.php';

$sql = 'INSERT INTO users(name, email, login, pass, role) VALUES(?, ?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass, $role]);

echo 'Бәрі дұрыс';
?>


