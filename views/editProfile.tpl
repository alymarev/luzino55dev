<form action="" name="editProfile" class="register">
    <input type="text" class="form_in" name="name" placeholder="Имя"/>
    <input type="text" class="form_in" name="name" placeholder="Фамилия"/>
    <input type="text" class="form_in" name="name" placeholder="Логин"/>
    <input type="password" class="form_in" name="name" placeholder="Пароль"/>
    <input type="email" class="form_in" name="name" placeholder="email"/>
    <input type="text" class="form_in" name="name" placeholder="Введите символы с картинки"/>
    <div class="captcha">
        <img src="<?=Config::SITE_ADDRESS?>capcha.php" alt="капча"/>
    </div>
    <input type="submit" class="form_in" value="Подтвердить изменения">
</form>