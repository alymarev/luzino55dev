<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 21.11.2014
 * Time: 13:18
 */

class MainController extends Controller{
    public function actionIndex(){
        $this->title = Config::SITE_NAME.":Главная";
        $this->meta_desc = "Это главная страница Официального сайта Лузинского сельского поселения";
        $this->meta_key = "Главная, Лузино,Лузинское сельское поселение, поселок";
        $articles = Articles::getAllShow(Config::COUNT_ARTICLES_ON_PAGE, $this->getOffset(Config::COUNT_ARTICLES_ON_PAGE));
        $pagination = $this->getPagination(Articles::getCount(),Config::COUNT_ARTICLES_ON_PAGE,"/");
        $blog = new Blog();
        $blog->articles = $articles;
        $blog->pagination = $pagination;
        $this->render($blog);
    }

    public function actionArticle(){
        $request = new Request();
        $articleDB = new Articles();
        $articleDB->load($request->id);
        $articleDB->addVisitor();
        $article = new Article();
        $article->article = $articleDB;
        $this->title = $articleDB->title;
        $this->meta_desc = $articleDB->meta_desc;
        $this->meta_key = $articleDB->meta_key;
        $this->render($article);
    }

    public function actionLogout(){
        Users::logout();
        $this->redirect($_SERVER["HTTP_REFERER"]);
    }
    public function actionRegister(){
        if ($this->request->register) {
            $user1 = new Users();
            $user1->loadOnEmail($this->request->email);
            $user2 = new Users();
            $user1->loadOnLogin($this->request->login);
            $sex = ($this->request->sex == "male") ? "Мужской" : "Женский";
            $checks = array(array(Captcha::check($this->request->captcha), true, "ERROR_CAPTCHA_CONTENT"));
            $checks[] = array($this->request->password, $this->request->password_conf, "ERROR_PASSWORD_CONF");
            $checks[] = array($user1->isSaved(), false, "ERROR_EMAIL_ALREADY_EXISTS");
            $checks[] = array($user2->isSaved(), false, "ERROR_LOGIN_ALREADY_EXISTS");
            $user = new Users();
            $fields = array("name", "family", "login", "email", array("setPassword()", $this->request->password), "birthday", array("sex", $sex));
            $user = $this->fp->process("register", $user, $fields, $checks);
            if ($user instanceof Users) {
                $this->mail->send($user->email, array("user" => $user, "link" => URL::get("activate", "", array("login" => $user->login, "key" => $user->activation_key), false, Config::SITE_ADDRESS)), "register");
                $this->redirect(URL::get("sregister"));
            }
        }
        $this->title = Config::SITE_NAME.":Регистрация";
        $this->meta_desc = "Это страница регистрации Официального сайта Лузинского сельского поселения.";
        $this->meta_key = "Главная, Лузино,Лузинское сельское поселение, поселок";
        $form = new Form();
        $form->header = "Регистрация";
        $form->name = "register";
        $form->action = URL::current();
        $form->message = $this->fp->getSessionMessage("register");
        $form->text("name", "Имя", $this->request->name);
        $form->text("family", "Фамилия", $this->request->family);
        $form->text("login", "Логин", $this->request->login);
        $form->text("email", "E-mail", $this->request->email);
        $form->password("password", "Пароль");
        $form->password("password_conf", "Повторите пароль");
        $form->radio("sex", "Укажите ваш пол", array(array("male", "Мужской"), array("female", "Женский")));
        $form->captcha("captcha", "Введите код с картинки");
        $form->submit("Регистрация");

        $form->addJSV("name", $this->jsv->name());
        $form->addJSV("family", $this->jsv->family());
        $form->addJSV("login", $this->jsv->login());
        $form->addJSV("email", $this->jsv->email());
        $form->addJSV("password", $this->jsv->password("password_conf"));
        $form->addJSV("captcha", $this->jsv->captcha());

        $this->render($form);
    }

    public function actionAccess()
    {
        $this->title = "Доступ запрещен.";
        $this->meta_desc = "Запрошенная страница не доступна.";
        $this->meta_key = "страница не доступна, нет доступа";

        $pm = new PageMessage();
        $pm->header = "Страница не найдена";
        $pm->text = "Данная страница не доступна для пользователей вашей группы.";
        $this->render($pm);
    }

    public function actionSRegister()
    {
        $this->title = Config::SITE_NAME . ":Регистрация";
        $this->meta_desc = "Это страница регистрации Официального сайта Лузинского сельского поселения.";
        $this->meta_key = "Главная, Лузино,Лузинское сельское поселение, поселок";

        $pm = new PageMessage();
        $pm->header = "Поздравляю!Регистрация прошла успешно";
        $pm->text = "На введенный вами e-mail высланы данные вашего профиля и ссылка на страницу с активацией.";
        $this->render($pm);
    }

    public function actionGalery()
    {
        $this->title = Config::SITE_NAME . ":Фотоальбомы";
        $this->meta_desc = "Здесь вы можете посмотреть фотографии из жизни Лузинского сельского поселения";
        $this->meta_key = "фотографии, Лузино.";
        $gallery = new AlbumsModule();
        $albums = Albums::getAll();
        $gallery->data = $albums;
        foreach ($albums as $album) {
            $first[] = Images::getImageOnAlbumID($album->id);
        }
        $gallery->first = "";
        $this->render($gallery);
    }

    public function actionAlbum()
    {
        $album = new Albums();
        $album->load($this->request->id);
        $this->title = Config::SITE_NAME . ":" . $album->title;
        $this->meta_desc = "Здесь вы можете посмотреть фотографии из жизни Лузинского сельского поселения";
        $this->meta_key = "фотографии, Лузино.";

        $images = Images::getAllOnAlbumID($this->request->id);
        $album = new Album();
        $album->images = $images;
        $this->render($album);
    }

    public function actionActivate()
    {
        $user = new Users();
        $user->loadOnLogin($this->request->login);
        if ($user->isSaved() && $user->activation_key == "") {
            $this->title = "Ваш профиль уже активирован!";
            $this->meta_desc = "Вы можете войти в свой аккаунт используя свои логин и пароль.";
            $this->meta_key = "активация, успешная активация, регистрация;";
        } elseif ($user->activation_key != $this->request->key) {
            $this->title = "Ошибка при активации!";
            $this->meta_desc = "Проверьте правильность ссылки.";
            $this->meta_key = "активация,ошибка при активации, регистрация;";
        } else {
            $user->activation_key = "";
            $user->reg_date = strftime(Config::FORMAT_DATE, $user->reg_date);
            $user->birthday = strftime(Config::FORMAT_DATE, $user->birthday);
            try {
                $user->save();
            } catch (Exception $e) {
                Logger::log($e->getMessage(),dirname(__DIR__));
            }
        }

        $pm = new PageMessage();
        $pm->header = $this->title;
        $pm->text = $this->meta_desc;
        $this->render($pm);
    }

    public function actionSearch()
    {
        $this->title = "Поиск: " . $this->request->query;
        $this->meta_desc = "Поиск " . $this->request->query . ".";
        $this->meta_key = "поиск, поиск " . $this->request->query;
        $articles = Articles::search($this->request->query);
        $sr = new SearchResult();
        if (mb_strlen($this->request->query) < Config::MIN_SEARCH_LENGTH) $sr->error_len = true;
        $sr->field = "full";
        $sr->query = $this->request->query;
        $sr->results = $articles;
        $this->render($sr);
    }

    public function actionBlock()
    {
        $this->title = "Ваш профиль был заблокирован Администрацией Лузинского сельского поселения.";
        $this->meta_desc = "Запрошенная страница не доступна.";
        $this->meta_key = "страница не доступна, нет доступа";

//        $pm = new PageMessage();
//        $pm->header = $this->title;
//        $pm->text = "Данная страница не доступна для пользователей вашей группы.Обратитесь к администрации.";
        $this->render("");
    }

} 