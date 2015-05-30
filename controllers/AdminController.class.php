<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 24.12.2014
 * Time: 12:31
 */

class AdminController extends Controller{

    public function actionIndex(){
        if ($this->auth_user->role_id != 4) $this->accessDenied();
        $this->title = "Admin-панель Официального сайта Лузинского сельского поселения";
        $this->renderAdmin();
    }

    public function actionArticles()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $articles = Articles::getALL();
        $list = new AdminList();
        $list->data = $articles;
        $list->type = "article";
        $list->text = "Статью";
        $list->functions = array(array("Измнить", "edit"), array("Удалить", "delete"));
        $this->renderAdmin($list);
    }

    public function actionAddArticle()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        if ($this->request->add_article) {
            $article = new Articles();
            $fields = array("title", "full", "meta_desc", "intro", array("meta_key", "meta_keys"));
            $article = $this->fp->process("add_article", $article, $fields);
            if ($article instanceof Articles) {
                self::redirect(URL::get("articles", "admin"));
            }
        }
        $form = new Form();
        $form->name = "add_article";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("add_article");
        $form->text("title", "Заголовок", $this->request->title);
        $form->textView("full", "Текст статьи", $this->request->full);
        $form->textView("intro", "Краткий текст", $this->request->intro);
        $form->textView("meta_desc", "Описание", $this->request->meta_desc);

        $form->submit("Добавить");

        $this->renderAdmin($form);
    }

    public function actionDeleteArticle()
    {
        $article = new Articles();
        $article->load($this->request->id);
        if (!is_null($article)) {
            $article->delete();
        }
        self::redirect(URL::get("articles", "admin"));
    }

    public function actionEditArticle()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        if ($this->request->edit_article) {
            $article = new Articles();
            $article->load($this->request->id);
            $fields = array("title", "full", "meta_desc", "intro", array("meta_key", "meta_keys"), "date");
            $article = $this->fp->process("edit_article", $article, $fields);
            if ($article instanceof Articles) {
                self::redirect(URL::get("articles", "admin"));
            }
        }
        $article = new Articles();
        $article->load($this->request->id);
        $form = new Form();
        $form->name = "edit_article";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("edit_articles");
        $form->text("title", "Заголовок", $article->title);
        $form->textView("full", "Текст статьи", $article->full);
        $form->textView("intro", "Краткий текст", $article->intro);
        $form->textView("meta_desc", "Описание", $article->meta_desc);
        $form->submit("Добавить");
        $this->renderAdmin($form);
    }

    public function actionNews()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $articles = NewsModel::getALL();
        $list = new AdminList();
        $list->data = $articles;
        $list->type = "news";
        $list->functions = array(array("Измнить", "edit"), array("Удалить", "delete"));
        $this->renderAdmin($list);
    }

    public function actionAddNews()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        if ($this->request->add_news) {
            $news = new NewsModel();

            $fields = array("title", array("text", trim(htmlspecialchars($this->request->text))), array("date", Model::getDate()));
            $news = $this->fp->process("add_news", $news, $fields);
            if ($news instanceof NewsModel) {
                self::redirect(URL::get("news", "admin"));
            }
        }
        $form = new Form();
        $form->name = "add_news";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("add_news");
        $form->text("title", "Заголовок", $this->request->title);
        $form->textView("text", "Текст новости", $this->request->text);
        $form->submit("Добавить");

        $this->renderAdmin($form);
    }

    public function actionEditNews()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        if ($this->request->edit_news) {
            $news = new NewsModel();
            $news->load($this->request->id);
            $fields = array("title", "text", array("date", Model::getDate()));
            $news = $this->fp->process("edit_news", $news, $fields);
            if ($news instanceof NewsModel) {
                self::redirect(URL::get("news", "admin"));
            }
        }
        $news = new NewsModel();
        $news->load($this->request->id);
        $form = new Form();
        $form->name = "edit_news";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("edit_news");
        $form->text("title", "Заголовок", $news->title);
        $form->textView("text", "Текст новости", $news->text);
        $form->submit("Редактировать");

        $this->renderAdmin($form);
    }

    public function actionDeleteNews()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $article = new NewsModel();
        $article->load($this->request->id);
        if (!is_null($article)) {
            $article->delete();
        }
        self::redirect(URL::get("news", "admin"));
    }

    public function actionPages()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $articles = Pages::getALL();
        $list = new AdminList();
        $list->data = $articles;
        $list->type = "page";
        $list->functions = array(array("Измнить", "edit"), array("Удалить", "delete"));
        $this->renderAdmin($list);
    }

    public function actionDocs()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $articles = Docs::getALL();
        $list = new AdminList();
        $list->data = $articles;
        $list->type = "docs";
        $list->functions = array(array("Удалить", "delete"), array("Ссылка на файл", "link"));
        $this->renderAdmin($list);
    }

    public function actionAddDocs()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $id = $this->request->id;
        if ($this->request->docs_name) {;
            $this->request->title;
            $img = $this->fp->uploadDocs("docs_name", $_FILES["file"], Config::MAX_GALLERY_IMAGE_SIZE, Config::DOCUMENTS);
            $obj = new Docs();
            if ($img) {
                $obj = $this->fp->process("docs_name", $obj, array(array("link", $img),array("title",$this->request->title)), array(), "SUCCESS_IMAGE_LOAD");
                if ($obj instanceof Docs) {
                    $this->redirect(URL::current());
                }
            }
        }
        $form = new Form();
        $form->name = "docs_name";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("docs_name");
        $form->enctype = "multipart/form-data";
        $form->text("title", "Заголовок", $this->request->title);
        $form->file("file", "Файл", $this->request->title);
        $form->submit("Добавить");

        $this->renderAdmin($form);
    }

    public function actionDeleteDocs(){
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $article = new Docs();
        $article->load($this->request->id);
        if (!is_null($article)) {
            File::delete($article->link);
            $article->delete();
        }
        self::redirect(URL::get("docs", "admin"));
    }

    public function actionLinkDocs(){
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $article = new Docs();
        $article->load($this->request->id);
        if (!is_null($article)) {
            $link = $article->link;
        }
        $this->renderAdmin($link);
    }

    public function actionAddPage()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        if ($this->request->add_news) {
            $news = new Pages();
            $fields = array("title", "link", "parent_id");
            $news = $this->fp->process("add_news", $news, $fields);
            if ($news instanceof Pages) {
                self::redirect(URL::get("pages", "admin"));
            }

        }
        $form = new Form();
        $form->name = "add_news";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("add_news");
        $form->text("title", "Заголовок", $this->request->title);
        $form->text("link", "Ссылка", $this->request->link);
        $form->section("parent_id", "Выберете Родительский элемент", Pages::getPages());
        $form->submit("Добавить");

        $this->renderAdmin($form);
    }

    public function actionEditPage()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        if ($this->request->add_news) {
            $news = new Pages();
            $news->load($this->request->id);
            $fields = array("title", "link", "parent_id");
            $news = $this->fp->process("add_news", $news, $fields);
            if ($news instanceof Pages) {
                self::redirect(URL::get("pages", "admin"));
            }

        }
        $pages = new Pages();
        $pages->load($this->request->id);
        $form = new Form();
        $form->name = "add_news";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("add_news");
        $form->text("title", "Заголовок", $pages->title);
        $form->text("link", "Ссылка", $pages->link);
        $form->section("parent_id", "Выберете Родительский элемент", Pages::getPages(), $default = $pages->parrent_id);
        $form->submit("Добавить");

        $this->renderAdmin($form);
    }

    public function actionDeletePage()
    {

        $article = new Pages();
        $article->load($this->request->id);
        if (!is_null($article)) {
            $article->delete();
        }
        self::redirect(URL::get("pages", "admin"));
    }

    public function actionUsers()
    {
        $user = new Users();
        $user->loadOnLogin($this->auth_user->login);
        if ($user->role_id != 4) $this->accessDenied();
        $users = Users::getAll();
        $list = new AdminUserList();
        $list->data = $users;
        $list->type = "user";

        $this->renderAdmin($list);
    }

    public function actionBlockuser()
    {
        $user = new Users();
        $user->load($this->request->id);
        if ($user->blocked == 0) {
            $user->blocked = 1;
            $user->save();
        } else {
            $user->blocked = 0;
            $user->save();
        }
        self::redirect(URL::get("users", "admin"));
    }

    public function actionDeleteUser()
    {
        $article = new Users();
        $article->load($this->request->id);
        if (!is_null($article)) {
            $article->delete();
        }
        self::redirect(URL::get("users", "admin"));
    }

    public function actionAddToAdminUser()
    {
        $user = new Users();
        $user->load($this->request->id);
        if ($user->role_id == 0) {
            $user->role_id = 4;
            $user->save();
        } else {
            $user->role_id = 0;
            $user->save();
        }
        self::redirect(URL::get("users", "admin"));
    }

    public function actionGallery()
    {
        $albums = Albums::getAll();
        $list = new AdminList();
        $list->data = $albums;
        $list->type = "album";
        $list->functions = array(array("Редактировать", "edit"));

        $this->renderAdmin($list);
    }

    public function actionAddalbum()
    {
        if ($this->request->add_album) {
            $album = new Albums();
            $album_1 = new Albums();
            $album_1->loadOnTitle($this->request->title);
            $check = array(array($album_1->isSaved(), false, "ALBUM_ALREADY_EXISTS"));
            $fields = array("title");
            $album = $this->fp->process("add_album", $album, $fields, $check);
            if ($album instanceof Albums) {
                self::redirect(URL::get("gallery", "admin"));
            }
        }
        $form = new Form();
        $form->name = "add_album";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("add_album");
        $form->text("title", "Название альбома", $this->request->name);
        $form->submit("Создать");
        $this->renderAdmin($form);
    }

    public function actionEditAlbum()
    {
        $id = $this->request->id;
        if ($this->request->add_album) {
            $img = $this->fp->uploadIMG("add_album", $_FILES["photo"], Config::MAX_GALLERY_IMAGE_SIZE, Config::DIR_GALLERY);
            $obj = new Images();
            if ($img) {
                $obj = $this->fp->process("add_album", $obj, array(array("link", $img), array("album_id", $id)), array(), "SUCCESS_IMAGE_LOAD");
                if ($obj instanceof Images) {
                    $this->redirect(URL::current());
                }
            }
        }

        $list = new ImagesList();
        $list->data = Images::getAllOnAlbumID($id);


        $form = new Form();
        $form->name = "add_album";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("add_album");
        $form->enctype = "multipart/form-data";
        $form->file("photo", "Добавить фото в альбом");
        $form->submit("Добавить");
        $list->form = $form;
        $this->renderAdmin($list . $form);

    }

    public function actionDeletePhoto()
    {
        $article = new Images();
        $article->load($this->request->id);
        if (!is_null($article)) {
            File::delete($article->link);
        }
        self::redirect(URL::get("gallery", "admin"));
    }

    public function actionEditmainphoto()
    {
        $article = new Images();
        $album = new Albums();

        $article->load($this->request->id);
        $album->load($article->album_id);
        $image = explode("/", $article->link);
        $this->fp->process("add_album", $album, array(array("main_image", $image[3])), array(), "SUCCESS_MAIN_PHOTO");
        self::redirect(URL::get("gallery", "admin"));
    }
}