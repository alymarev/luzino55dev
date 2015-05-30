<div class="hidden_table">
    <?foreach($data as $item) { ?>
    <div class="gallery_item">
        <img src="<?=$item->link?>" alt="<?=$item->link?>"/>
        <a href="/admin/deletephoto?id=<?=$item->id?>" class="list-lk">Удалить</a>
        <a href="/admin/editmainphoto?id=<?=$item->id?>" class="list-lk">Сделать главным</a>
    </div>
    <?}?>
</div>


