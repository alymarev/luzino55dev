<?foreach($data as $items) { ?>
<div class="album">
    <img class="wrap" src="<?=$items->main_image?>" alt="<?=$items->main_image?>">
    <span class="album_title"><a href="<?=Config::SITE_ADDRESS?>album?id=<?=$items->id?>"><?=$items->title?></a></span>
</div>
<?}?>