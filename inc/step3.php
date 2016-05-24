<form action="" method="post">
    <div class="form-group">
        <label for="comment">Ваши личные качества:</label>
        <textarea class="form-control" rows="5" id="your" name="your"></textarea>
    </div>

    <div class="checkbox">
        <label><input type="checkbox" name="1" value="Усидчивость">Усидчивость</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="2" value="Опрятность">Опрятность</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="3" value="Самообучаемость">Самообучаемость</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="4" value="Трудолюбие">Трудолюбие</label>
    </div>
    <input type="hidden" name="step" value="<?=++$step?>">
    <?php
    $_SESSION['questions']['color']  = clean($_POST['color']);

    if($_FILES[FIELDNAME]['error'] != 0){
        checkImage($image_errors[$_FILES[FIELDNAME]['error']]);
    }
    if(!isset($_FILES[FIELDNAME]['tmp_name']) || !is_uploaded_file($_FILES[FIELDNAME]['tmp_name'])){
        checkImage('Неверный файл');
    }
    if(!getimagesize($_FILES[FIELDNAME]['tmp_name'])){
        checkImage('Вы пытаетесь отправить не картинку');
    }
    $now = time();
    while(file_exists($upload_file = UPLOAD_DIR . $now . $_FILES[FIELDNAME]['name'])){
        $now++;
    }

    if(!move_uploaded_file($_FILES[FIELDNAME]['tmp_name'], $upload_file)){
        checkImage('Ошибка при сохранении');
    }
    $_SESSION['questions']['upload_file'] = $upload_file;
    ?>
    <input type='submit' value='Далее'>
</form>