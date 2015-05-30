<?$count_navigation = count($navigation);?>
<aside>
    <img src="/images/logo.png" alt="" class="logo">
    <?for($i = 0;$i < $count_navigation;$i++){ ?>
    <li class="item">
        <img src="/images/<?=$images[$i]?>" alt="" class="item_icon"/>
        <a href="<?=$navigation[$i]['link']?>" class="item_triger"><?=$navigation[$i]['title']?></a>
    </li>
    <?}?>

</aside>