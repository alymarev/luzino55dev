<!--<div class="user_panel">
    <img src="<?=$avatar?>" alt="" class="avatar">

    <p class="welcome">Добро пожаловать, <?=$user_login?></p>
    <a href="<?=Config::SITE_ADDRESS?>logout/" class="logout">LOGOUT</a>
</div>-->
<div class="user_panel">
    <div class="user_panel__avatar">
        <img src="<?=$avatar?>" alt="avatar" class="avatar__img">

    </div>
    <div class="user_panel__login"><?=$user_login?></div>
</div>