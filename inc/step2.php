<form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    <label for="picture">Выберите фото</label>
    <input type="file" name="picture" id="picture" accept="image/png, image/jpg,image/jpeg,image/gif" required>
    <br>

    <label for="color">Выберите ваш любымий цвет:</label>
    <input type="color" id="color" name="color">
    <input type="hidden" name="step" value="<?=++$step?>">
    <br>
    <hr>
    <?php
    $_SESSION['questions']['sex'] = clean($_POST['sex']);
    $_SESSION['questions']['last_name']  = clean($_POST['last_name']);
    $_SESSION['questions']['name']  = clean($_POST['name']);
    $_SESSION['questions']['pat']  = clean($_POST['pat']);
    $_SESSION['questions']['date']  = clean($_POST['date']);
    ?>
    <input type='submit' value='Далее'>
</form>