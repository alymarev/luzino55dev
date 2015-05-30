<label for="#<?=$input->name?>-ck"><?=$input->label?></label>
<textarea name="<?=$input->name?>" id="<?=$input->name?>-ck" class="article-area"><?=$input->value?></textarea>
<script type="text/javascript">
    CKEDITOR.replace("<?=$input->name?>-ck");
</script>