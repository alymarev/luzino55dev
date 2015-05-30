<div id="user-panel">
    <h2 class="main-news-title">Панель</h2>
    <img src="<?=$user->avatar;?>" alt="" class="avatar">
    <div class="welcome">Зравствуйте, <b><?=$user->login?></b>!</div>
    <div class="user-menu-panel">
        <?if($user->role_id == 4) { ?><a href="admin/index">Admin-панель</a><?}?>
        <a href="/user/editProfile">Редактировать профиль</a>
        <a href="/logout">Выйти</a>
    </div>
</div>