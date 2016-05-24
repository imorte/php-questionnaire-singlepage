<?php

define("UPLOAD_DIR",$_SERVER['DOCUMENT_ROOT'] . '/upload/');
define("FIELDNAME", 'picture');

$image_errors = array(
    1 => 'Превышен макс. размер файла!php ini',
    2 => 'Превышен размер файла HTML',
    3 => 'Была отправлена только часть файла',
    4 => 'Не выбран файл',
);

/**
 * Clean value
 * @param $data
 * @return string
 */
function clean($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Check length
 * @param $data
 * @param $min
 * @param $max
 * @return bool
 */
function checkLength($data, $min, $max){
    if(strlen($data) < $min || strlen($data) > $max){
        return true;
    }
    return false;
}

/**
 * Redirect to error page
 * @param $error_message
 */
function handle_error($error_message){
    header("Location: ../error.php?error_message={$error_message}");
    exit();
}

/**
 * Returns the path of the image
 * @param $file_sys_path
 * @return mixed
 */
function get_img_web_path($file_sys_path){
    return str_replace($_SERVER['DOCUMENT_ROOT'], '', $file_sys_path);
}

/**
 * @param $print
 */
function checkImage($print){
    echo $print;
    echo "<br><a href='../index.php'>На главную</a>";
    session_destroy();
    exit();
}

/**
 * Checks on the table empty
 * @return bool
 */
function isEmpty(){
    $dsn = "mysql:host=localhost;dbname=axioma;charset=utf8";
    $opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    $pdo = new PDO($dsn, 'root', 'root', $opt);
    $req=$pdo->query("select id from person");
    return $req->fetchColumn()?false:true;
}