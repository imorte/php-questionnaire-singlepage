<form action="" method="post" id="form">
    Выберите пол:
    <div class="radio">
        <label><input type="radio" name="sex" value="Мужской" required>Мужской</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="sex" value="Женский">Женский</label>
    </div>
    <div class="form-group">
        <label for="last_name">Фамилия:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
    <div class="form-group">
        <label for="name">Имя:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="pat">Отчество:</label>
        <input type="text" class="form-control" id="pat" name="pat">
    </div>
    Дата рождения:
    <input type="date" id="date" name="date" required>
    <br>
    <hr>
    <input type='submit' value='Далее'>
    <br>
    <hr>
    <input type="hidden" name="step" value="<?=++$step?>">
</form>