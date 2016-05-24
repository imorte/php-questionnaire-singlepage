<?php
$_SESSION['questions']['your']  = clean($_POST['your']);
$_SESSION['questions']['skill_1']  = clean($_POST['1']);
$_SESSION['questions']['skill_2']  = clean($_POST['2']);
$_SESSION['questions']['skill_3']  = clean($_POST['3']);
$_SESSION['questions']['skill_4']  = clean($_POST['4']);
?>
<a href="../proccess.php">Сохранить</a>