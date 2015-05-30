<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="<?=Config::SITE_ADDRESS?>/css/admin/main.css">
</head>
<body>
<!--  Page:Articles-->
<div class="container">
    <?=$aside?>

    <main id="content">
        <header class="header">
            <h1 class="header__title">
                Статьи
            </h1>
        </header>
        <div class="content__settings">
            <div class="settings__row">
                <span id="ID" class="row__cell">1</span>
                <span id="title" class="row__cell">Глава поселения</span>
                <span  class="row__cell cell__btn"><a href="#" class="cell__trigger">Редактировать</a></span>
                <span class="row__cell cell__btn"><a href="#" class="cell__trigger">Удалить</a></span>
            </div>
            <div class="settings__row">
                <span id="ID" class="row__cell">2</span>
                <span id="title" class="row__cell">Муниципальные служащие</span>
                <span  class="row__cell cell__btn"><a href="#" class="cell__trigger">Редактировать</a></span>
                <span class="row__cell cell__btn"><a href="#" class="cell__trigger">Удалить</a></span>
            </div>
            <div class="settings__row">
                <span id="ID" class="row__cell">3</span>
                <span id="title" class="row__cell">Информация МКУ "ЦРДМ"</span>
                <span  class="row__cell cell__btn"><a href="#" class="cell__trigger">Редактировать</a></span>
                <span class="row__cell cell__btn"><a href="#" class="cell__trigger">Удалить</a></span>
            </div>
            <div class="settings__row">
                <span id="ID" class="row__cell">4</span>
                <span id="title" class="row__cell">Администрация</span>
                <span  class="row__cell cell__btn"><a href="#" class="cell__trigger">Редактировать</a></span>
                <span class="row__cell cell__btn"><a href="#" class="cell__trigger">Удалить</a></span>
            </div>

            <div class="settings__row">
                <span id="ID" class="row__cell">5</span>
                <span id="title" class="row__cell">ПАСПОРТ ЛУЗИНСКОГО СЕЛЬСКОГО ПОСЕЛЕНИЯ</span>
                <span  class="row__cell cell__btn"><a href="#" class="cell__trigger">Редактировать</a></span>
                <span class="row__cell cell__btn"><a href="#" class="cell__trigger">Удалить</a></span>
            </div>
            <a href="" class="cell__trigger">Добавить</a>
        </div>
    </main>
</div>
</body>
</html>