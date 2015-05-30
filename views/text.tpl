<div>
    <label for="<?=$input->name?>"><?=$input->label?></label>
    <input class="form_in" id="<?=$input->name?>" type="text" name="<?=$input->name?>" value="<?=$input->value?>"
           placeholder="<?=$input->default_v?>" class="form_in" <?php include "jsv.tpl"; ?> />
</div>