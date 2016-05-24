<?php
require_once 'lib/lib.php';
require_once "database/connection.php";
session_start();
if(!isset($_SESSION['questions']) and !isset($_POST['step'])){
    $step = 0;
}else{
    $step = $_POST['step'];
}
if($_GET['reset'] == 1){
    handle_error('Вы вышли из анкетирования');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 70px;">
        <?php
        if(isset($_POST['step'])){
            echo "<a href=\"index.php?reset=1\">Прервать анкетирование</a><br><hr>";
        }
        switch($step) {
            case 0:
                include "inc/start.php";
                break;
            case 1:
                include "inc/step1.php";
                break;
            case 2:
                include "inc/step2.php";
                break;
            case 3:
                include "inc/step3.php";
                break;
            case 4:
                include "inc/step4.php";
                break;
            case 5:
                include "proccess.php";
                break;
        }
        ?>
        <br>
        <hr>
    </div>
</div>
</body>
</html>