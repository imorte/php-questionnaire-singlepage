<?php
require_once '../database/connection.php';
require_once '../lib/lib.php';
if(!$_COOKIE['auth']) handle_error("Доступ запрещен");
$id = clean($_GET['id']);

$stmt = $pdo->prepare('SELECT * FROM person WHERE id=?');
$stmt->execute(array($id));
$aux = $stmt->fetch(PDO::FETCH_ASSOC);
if($_GET['id'] != $aux['id']){
    handle_error("Такой страницы нет!");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <a href="index.php">Вернуться</a>
        <hr>
        <br>
        <img src="<?=get_img_web_path($aux['img_path'])?>"><br>
        <?php
        echo "Пол: {$aux['sex']}<br>";
        echo "Имя: {$aux['name']}<br>";
        echo "Фамилия: {$aux['last_name']}<br>";
        echo "Отчество: {$aux['pat']}<br>";
        echo "Дата рождения: {$aux['date']}<br><hr>";
        ?>
        <h3>Любимый цвет:</h3>
        <div style="background-color: <?=$aux['color']?>; width: 50px;height: 50px;"></div>
        <br>
        <hr>
        <?php
        if(!empty($aux['your'])){
            echo "Личные качества: {$aux['your']}<br>";
        }else{
            echo "Личные качества не указаны<br>";
        }
        if(!empty($aux['skill_1']) || !empty($aux['skill_2']) || !empty($aux['skill_3']) || !empty($aux['skill_4'])){
            echo "Навыки: <br>";
            echo "<ul>";
            for($i = 1;$i <= 4;$i++){
                if($aux['skill_'.$i] == '') continue;
                echo "<li>" . $aux['skill_'.$i] . "</li>";
            }
            echo "</ul>";
        }else{
            echo "Навыки не указаны";
        }
        ?>
        <br><hr>
    </div>
</div>
</body>
</html>