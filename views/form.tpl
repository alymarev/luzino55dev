<?php if (isset($hornav)) { ?>
<div class="main">
    <?php } ?>
    <?php if ($header) { ?><h1><?=$header?></h1><?php } ?>
    <?php if ($message) { ?><?php } ?>
    <p class="message"><?=$message?></p>
    <div class="form">
        <div <?php if ($name) { ?>id="<?=$name?>"<?php } ?>>
        <form
        <?php if ($name) { ?>name="<?=$name?>"<?php } ?> action="<?=$action?>" method="<?=$method?>"
        <?php if ($check) { ?> onSubmit="return checkForm(this);"<?php } ?> <?php if ($enctype) { ?>
        enctype="<?=$enctype?>"<?php } ?>>
        <?php foreach ($inputs as $input) { ?>
        <?php include $input->type.".tpl"; ?>
        <?php } ?>
        </form>
    </div>
</div>

<?php if (isset($hornav)) { ?></div><?php } ?>
