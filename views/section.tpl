<div>
    <table>
        <tr>
            <td></td>
            <td>ID</td>
            <td>Заглавие</td>
        </tr>
        <tr>
            <td><input type="radio" name="<?=$input->name?>" value="0"/></td>
            <td>0</td>
            <td>Нет родителя</td>
        </tr>
        <?foreach($input->value as $v) { ?>
        <tr>
            <td><input type="radio" name="<?=$input->name?>" value="<?=$v->id?>"/></td>
            <td><?=$v->id?></td>
            <td><?=$v->title?></td>
        </tr>
        <?}?>
    </table>
</div>