<?php
require_once '../database/connection.php';
require_once '../lib/lib.php';
session_start();
if(!$_COOKIE['auth']) handle_error("Доступ запрещен");
if(clean($_GET['exit'] == 1)){
    setcookie('auth','', time() - 3600);
    header('Location: ../index.php');
}
$stmt = $pdo->query('SELECT id, last_name,date, name FROM person');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <h1>Админка</h1>
        <h3>Добро пожаловать, <?=$_COOKIE['auth']?></h3>
        <a href="<?=$_SERVER['PHP_SELF'].'?exit=1'?>">Выход</a>
        <br>
        <hr>
        <ul>
            <?php
            if(isEmpty()){
                echo "Анкет нет";
            }
            while($row = $stmt->fetch()){
                echo "<a href=" . "show_profile.php?id=" . "{$row['id']}>". $row['name'] . ' ' . $row['last_name']. "</a><br><hr>";
            }
            ?>
        </ul>
    </div>
</div>
</body>
</html>