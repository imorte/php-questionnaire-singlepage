<?php
require_once '../database/connection.php';
require_once '../lib/lib.php';
session_start();
$stmt = $pdo->query("SELECT login, password FROM auth");
if(!$stmt) handle_error('Ошибка базы данных');

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$row) handle_error('Ошибка базы данных');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = clean($_POST['login']);
    $password = clean($_POST['password']);

    if($login == $row['login'] && md5($password) == $row['password']){
        setcookie('auth',$login,time()+ 1200);
        header('Location: index.php');
    }else{
        handle_error('Ошибка входа');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Войдите</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body style="margin-top: 50px">
<div class="container">
    <div class="row">
        <p class="bg-success" style="padding: 20px;text-align: center;">
            login: axioma
            password: axioma
        </p>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Логин</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="login">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-default">Войти</button>
        </form>
    </div>
</div>
</body>
</html>