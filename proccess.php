<?php
session_start();
require_once 'database/connection.php';
require_once 'lib/lib.php';

$input = $_SESSION['questions'];

$sex = $input['sex'];
$last_name = $input['last_name'];
$name = $input['name'];
$pat = $input['pat'];
$date = $input['date'];
$color = $input['color'];
$your = $input['your'];
$picture = $input['picture'];
$skill_1 = $input['skill_1'];
$skill_2 = $input['skill_2'];
$skill_3 = $input['skill_3'];
$skill_4 = $input['skill_4'];
$upload_file = $input['upload_file'];

if(checkLength($last_name,3,20)){
    echo "<h3>Фамилия должна быть от 3 до 20 символов.</h3><br>";
    $step = 0;
    echo "<a href='index.php'>Попробуйте снова</a>";
    exit();
}
if(checkLength($name,3,20)){
    echo "<h3>Имя должно быть от 3 до 20 символов.</h3>";
    $step = 0;
    echo "<a href='index.php'>Попробуйте снова</a>";
    exit();
}
if(checkLength($pat,3,20)){
    echo "<h3>Отчество должно быть от 3 до 20 символов.</h3>";
    $step = 0;
    echo "<a href='index.php'>Попробуйте снова</a>";
    exit();
}

$sql = "INSERT INTO person(sex,last_name,name,pat,date,color,your,skill_1,skill_2,skill_3,skill_4, img_path) VALUES(
    :sex,:last_name,:name,:pat,:date,:color,:your,:skill_1,:skill_2,:skill_3,:skill_4,:img_path)";
$query = $pdo->prepare($sql);
$result = $query->execute([
    ":sex" => $sex,
    ":last_name" => $last_name,
    ":name" => $name,
    ":pat" => $pat,
    ":date" => $date,
    ":color" => $color,
    ":your" => $your,
    ":skill_1" => $skill_1,
    ":skill_2" => $skill_2,
    ":skill_3" => $skill_3,
    ":skill_4" => $skill_4,
    ":img_path" => $upload_file,
]);
$step = 0;
echo "Спасибо за заполнение";
session_destroy();
?>
<br>
<hr>
<a href="index.php">Вернуться на главную</a>
