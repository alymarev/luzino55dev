<div class="quick_links">
    <h3 class="quick">Быстрые ссылки</h3>

    <?foreach($links as $link) { ?>
    <li class="quick-item">
        <a href="<?=$link['link']?>"><?=$link['title']?></a>
    </li>
    <?}?>
</div>