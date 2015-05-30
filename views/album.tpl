<div class="gallry">
    <?foreach($images as $image) { ?>
    <a rel="gallery" class="photo" href="<?=$image->link?>"><img src="<?=$image->link?>" alt="<?=$image->link?>"
                                                                 class="small"></a>
    <?}?>
</div>
<script src="<?=Config::SITE_ADDRESS?>js/jquery.fancybox.pack.js"></script>
<script src="<?=Config::SITE_ADDRESS?>js/jquery.mousewheel-3.0.6.pack.js"></script>
<script>
    $(document).ready(function () {
        $(".photo").fancybox();
    });
</script>