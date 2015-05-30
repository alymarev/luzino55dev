/**
 * Created by лымарев on 03.11.2014.
 */
$(document).ready(function(){
    $(".accordeon_triger[href='']").click(function(e){
        e.preventDefault();

        var $this = $(this),
            item = $this.closest(".accordeon_item"),
            list = $this.closest(".accordeon_list"),
            items = list.find(".accordeon_item"),
            ico = item.closest(".ico"),
            content = item.find(".accordeon_inner"),
            otherContent = list.find(".accordeon_inner"),
            duration = 300;

        if(!item.hasClass("active")){
            items.removeClass("active");
            item.addClass("active");

            otherContent.stop(true,true).slideUp(duration);
            content.stop(true,true).slideDown(duration);
            ico.animate(function(){
                $(this).css({"transform":"rotate(180deg)"});
            },duration);
        }
        else{
            content.stop(true,true).slideUp(duration);
            item.stop(true, true).removeClass("active");
        }
        $("a.photo").fancybox();

    });
});