<p>Поиск по запросу: <span class="tag"><?=$query?></span></p>
<?$i = 1;?>
<p>Колличество результатов по запросу: <?=count($results)?></p>
<?foreach($results as $result){ ?>
<article>
    <div class="article_header">
        <div id="sr_id">
            <?=$i?>
        </div>
        <div id="sr_title"><a href="<?=$result->link?>"><?=$result->title?></a></div>
        <div id="sr_date"><?=$result->date?></div>
        <div class="clear"></div>
    </div>
    <div class="article_text"><?=$result->intro?></div>
</article>
<?}?>