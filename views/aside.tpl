<aside>
    <?=$menu?>
    <form action="/search" name="search" method="post">
        <h2 class="main-news-title">Поиск</h2>
        <div class="search-wrap">
            <input type="search" name="query"/>
            <button><span class="icon-search"></span></button>
        </div>
    </form>
    <?=$auth?>
    <?=$news?>
</aside>