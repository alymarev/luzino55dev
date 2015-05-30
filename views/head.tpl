<meta charset="UTF-8">
<title><?=$title?></title>
    <?foreach ($meta as $m) { ?>
        <meta name="<?=$m->name?>" content="<?=$m->content?>"/>
    <?}?>
    <? foreach($css as $href){ ?>
        <link rel="stylesheet" href="<?=$href?>"/>
    <?}?>
