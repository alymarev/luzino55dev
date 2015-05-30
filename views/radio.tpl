<div>

    <label for="<?=$input->name?>"><?=$input->label?></label><br/>
    <?foreach($input->value as $value){ ?>
    <input type="radio" name="<?=$input->name?>" value="<?=$value[0]?>"/><?=$value[1]?>
    <?}?>
</div>