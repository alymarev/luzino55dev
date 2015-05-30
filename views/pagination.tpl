<?php
    $count_pages = ceil($count_elemments/ $count_on_page);
    if($count_pages > 1){
        $left = $active - 1;
        $right = $count_pages - $active;

        if($left - floor($count_show_pages / 2)) $start = 1;
        else $start = $active - floor($count_show_pages / 2);
        $end = $start + $count_pages - 1;
        if($end > $count_pages){
            $start -= ($end-$count_pages);
            $end = $count_pages;
            if($start < 1)  $start = 1;
        }

    }
?>
<div class="pagination">

    <?for($i = $start; $i <= $end;$i++) { ?>
        <?if($i == 1) { ?>
            <a href="<?=$url?>" <?if($i == $active){ ?> class="active" <?}?> ><?=$i;?></a>
        <?} else { ?>
            <a href="<?=$url_page.$i?>" <?if($i == $active){ ?> class="active"<?}?> ><?=$i;?></a>
        <?}?>
    <?}?>
</div>
