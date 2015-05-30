<?foreach($articles as $article){ ?>
<div class="article-wrap">
    <div class="text-article">
        <div class="row">
            <h3 class="title"><?=$article->title?></h3>

            <div class="other date-article">
                <span class="icon-calendar"></span>
                <span><?=$article->date?></span>
            </div>
            <div class="other views-article">
                <span class="icon-eye"></span>
                <span><?=$article->views?></span>
            </div>
            <a href="<?=$article->link?>" class="more">Подробнее</a>
            <div class="clear"></div>
        </div>
        <div class="text">
            <?=$article->intro?>
        </div>
    </div>

    <div class="clear"></div>
</div>
<?}?>
<?=$pagination?>