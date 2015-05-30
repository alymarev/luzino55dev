<table class="list">
    <tr class="list-row">
        <td class="list-col">id</td>
        <td class="list-col">Заголовок</td>
        <td class="list-col">Функции</td>
    </tr>
    <?foreach($data as $item) { ?>
    <tr class="list-row">
        <td class="list-col"><?=$item->id?></td>
        <td class="list-col"><?=$item->title?></td>
        <td class="list-col">
            <?foreach($functions as $function) { ?>
            <a href="/admin/<?=$function[1].$type?>?id=<?=$item->id?>" class="list-lk"><?=$function[0]?></a>
            <?}?>
        </td>
    </tr>

    <?}?>

</table>

<a href="/admin/add<?=$type?>/" class="add_to_db">Добавить <?=$text?></a>