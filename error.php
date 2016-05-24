<?php
require_once 'lib/lib.php';
$error_message = clean($_GET['error_message']);
if(!$error_message){
    $error_message = "Такой страницы нет!";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <h3>
            <?php
            echo $error_message;
            $step = 0;
            if(isset($_SESSION))session_destroy();
            ?>
        </h3>
        <br>
        <hr>
        <a href="/index.php">Вернуться на главную страницу</a>
    </div>
</div>
</body>
</html>