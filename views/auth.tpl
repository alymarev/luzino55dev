<form name="auth" action="<?=$action?>"  method="post">
    <h2 class="main-news-title">Авторизация</h2>
    <div class="search-wrap">
        <?if($message)?><?=$message?>
        <input type="text" name="login" class="form_in" placeholder="Логин"/>
        <input type="password" name="password" class="form_in" placeholder="Пароль"/>
        <input type="submit" name="auth" value="Войти" class="form_in"/>
        <a href="<?=$link_register?>" class="auth_link">Регистрация</a><br>
        <a href="<?=$link_remind?>" class="auth_link">Забыли пароль?</a>
    </div>
</form>