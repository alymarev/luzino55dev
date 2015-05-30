
<div id="news">
    <h2 class="main-news-title">Новости</h2>
    <div class="news-items">
        <?if(count($news) != 0){ ?>
            <?foreach( $news as $news_item) { ?>
                <div class="news-item">
                    <div class="date"><?=$news_item->date["day"]?> <br/> <?=$news_item->date["month"]?></div>
                    <div class="text-block">
                        <h3><?=$news_item->title?></h3>
                        <?=$news_item->text?>
                    </div>
                    <div class="clear"></div>
                </div>
            <?}?>
        <?}?>
    </div>

</div>