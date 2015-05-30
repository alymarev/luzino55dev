<header>
    <img src="<?=Config::SITE_ADDRESS?>/images/flag.png" alt="flag" id="flag"/>
    <div class="slider">
        <ul id="slider">
            <li class="slide"><img src="<?=Config::SITE_ADDRESS?>images/slider/slide1.jpg" alt=""></li>
            <li class="slide"><img src="<?=Config::SITE_ADDRESS?>images/slider/slide2.jpg" alt=""></li>
            <li class="slide"><img src="<?=Config::SITE_ADDRESS?>images/slider/slide3.jpg" alt=""></li>
        </ul>
    </div>
    <script src="/js/jquery.js"></script>
    <script>
        $(document).ready(function () {
            var slider = $("#slider");
            var margin = 0;
            setInterval(function () {
                if (margin < -1800)   margin = 0;
                slider.animate({
                    'margin-left': margin + 'px'
                }, 1000);
                margin -= 900;
            }, 7000);
        });
    </script>
    <div class="logo">
        <h1>
            <?=$title?>
        </h1>
    </div>
</header>