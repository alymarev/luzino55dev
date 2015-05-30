<main class="content">
    <div class="forms" id="tab-container">
        <ul>
            <?foreach($actions as $action) { ?>
            <li class="tabs"><a href="<?=$action->link"><?=$action->title?></a></li>
            <?}?>
        </ul>
        <div id="add">
            <form action="#" name="add" class="form" id="add-article-form" method="post">
                <input type="text" name="article_title" class="form_in" placeholder="Заголовок статьи">
                        <textarea name="full" id="article-text-add" class="article-area"
                                ></textarea>
                <input type="submit" value="Отправить" name="send" class="input_send">
                <script type="text/javascript">
                    CKEDITOR.replace("article-text-add");
                </script>
            </form>
        </div>
        <div id="edit">
            <form action="#">
                <select name="articles" id="" class="form_in">
                    <option value="null"> Выбор статьи</option>
                </select>
            </form>
            <form action="#" name="add" class="form" id="edit-article-form" method="post">
                <input type="text" name="article_title" class="form_in" placeholder="Заголовок Статьи ...">
                        <textarea name="full" id="article-text-edit" class="article-area"
                                ></textarea>
                <input type="submit" value="Отправить" name="send" class="input_send">
            </form>
            <script type="text/javascript">
                CKEDITOR.replace("article-text-edit");
            </script>
        </div>
        <div id="remove">
            <form action="#" id="delete-form">
                <select name="articles" id="" class="form_in">
                    <option value="null"> Выбор статьи</option>
                    <input type="submit" value="Отправить" name="send" class="input_send">
                </select>
        </div>
    </div>
</main>