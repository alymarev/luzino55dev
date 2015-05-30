<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="jquery-1.11.2.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<div class="container">
    <div class="admin">
        <form action="<?=$action?>" name="admin_login" class="admin_form">
            <input type="text" class="admin_form_in" name="login" placeholder="Логин">
            <input type="password" class="admin_form_in" name="password" placeholder="Пароль">
            <input type="submit" class="admin_form_submit" value="Войти" name="admin_login">
        </form>
    </div>
</div>
</body>
</html>