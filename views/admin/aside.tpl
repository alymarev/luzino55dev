<!--<?$count_navigation = count($navigation);?>
<aside>
    <img src="/images/logo.png" alt="" class="logo">
    <?for($i = 0;$i < $count_navigation;$i++){ ?>
    <li class="item">
        <img src="/images/<?=$images[$i]?>" alt="" class="item_icon"/>
        <a href="<?=$navigation[$i]['link']?>" class="item_triger"><?=$navigation[$i]['title']?></a>
    </li>
    <?}?>

</aside>-->
<aside class="sidebar">
    <div class="sidebar__logo">
        <img src="images/Group-1-copy.png" alt="DASHBOARD" class="sidebar__logo__img">
    </div>
    <div class="sidebar__menu">
        <?for($i = 0; $i < $count_navigation;$i++){ ?>
            <li class="menu__item">
                <img src="" alt="">
                <a href="<?=$navigation[$i]['link']?>" class="item__trigger"><?=$navigation[$i]['title']?></a>
            </li>
        <?}?>
        <?=$user_panel?>
</aside>