<table class="list">
    <tr class="list-row">
        <td class="list-col">id</td>
        <td class="list-col">Заголовок</td>
        <td class="list-col">Функции</td>
    </tr>
    <?foreach($data as $item) { ?>
    <tr class="list-row">
        <td class="list-col"><?=$item->id?></td>
        <td class="list-col"><?=$item->login;?></td>
        <td class="list-col">
            <a href="/admin/blockuser?id=<?=$item->id?>" class="list-lk"><?if($item->blocked == 0){
                ?>Заблокировать<?} else { ?>Разблокировать <?}?></a>
            <a href="/admin/deleteuser?id=<?=$item->id?>" class="list-lk">Удалить</a>
            <a href="/admin/addtoadminuser?id=<?=$item->id?>" class="list-lk"><?if($item->role_id == 0) { ?>Добавить в
                администрацию<?} else { ?>Убрать из администрации<?}?></a>
        </td>
    </tr>

    <?}?>

</table>

<a href="/admin/add<?=$type?>/" class="add_to_db">Добавить <?=$text?></a>