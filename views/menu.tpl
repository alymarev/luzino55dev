<div class="menu">
    <ul class="accordeon">
        <ul class="accordeon_list">
            <?foreach($pages as $page) { ?>
            <li class="accordeon_item">
                <a class="accordeon_triger" href="<?if($page->link != '-no-') echo $page->link?>" ><?=$page->title ?><?if($page->link == '-no-') { echo '<span class="ico icon-angle-down"></span>';}?></a>
                <ul class="accordeon_inner">
                    <?if(isset($childs[$page->id])) { ?>
                        <?foreach($childs[$page->id] as $child) { ?>
                            <li class="accordeon_inner_item"><a href="<?=$child->link?>"><?=$child->title?></a></li>
                        <?}?>
                    <?}?>
                </ul>
            </li>
            <?}?>
    </ul>
</div>