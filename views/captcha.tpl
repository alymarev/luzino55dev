<div>
    <label for="<?=$input->name?>">Введите код с картинки:</label>
    <input class="form_in" type="text" name="<?=$input->name?>" id="<?=$input->name?>" <?php include "jsv.tpl"; ?> />
</div>
<div class="captcha">
    <img src="capcha.php" alt="Капча"/>
</div>