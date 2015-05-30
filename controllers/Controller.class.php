<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 8:06
 */

class Controller extends AbstractController{

    protected $view,$title, $meta_desc, $meta_key;
    public function __construct(){
        parent::__construct();
        $this->view = new View();
        $this->request = new Request();
    }

    public function action404()
    {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        $this->title = "Страница не найдена - 404";
        $this->meta_desc = "Запрошенная страница не существует.";
        $this->meta_key = "страница не найдена, страница не существует, 404";

        $pm = new PageMessage();
        $pm->header = "Страница не найдена";
        $pm->code = "404";
        $pm->text = "К сожалению, запрошенная страница не существует. Проверьте правильность ввода адреса.";
        $this->render($pm);
    }

    protected function render($content = ""){
        $params["head"] = $this->getHead();
        $params["header"] = $this->getHeader();
        $params["aside"] = $this->getAside();
        $params["footer"] = $this->getFooter();
        $params["content"] = $content;
        $this->view->render("main",$params);
    }

    public function getHead(){
        $head = new Head();
        $head->title = $this->title;
        $head->css = array("css/jquery.fancybox.css", "/css/main-dist-dist.css", "/css/fontello.css", "http://allfont.ru/css/?fonts=open-sans-bold", "http://allfont.ru/css/?fonts=open-sans-light");
//        $head->meta("Content-Type", "text/html; charset=utf-8", true);
        $head->meta("description", $this->meta_desc, false);
        $head->meta("keywords", $this->meta_key, false);
        $head->meta("viewport", "width=device-width", false);
        return $head;
    }

    public function getHeader(){
        $header = new Header();
        $header->title = "Официальный сайт Лузинского сельского поселения";
        return $header;
    }

    public function getAside(){
        $menu = new MainMenu();
        $menu->pages = Pages::getPages();
        $childs = array();
        foreach($menu->pages as $page){
            if($page->link == "-no-") $childs[$page->id] = Pages::getChilds($page->id);
        }
        $auth = $this->getAuth();
        $menu->childs = $childs;
        $aside = new Aside();
        $aside->menu = $menu;
        $news = new News();
        $news->news = NewsModel::getLastNews();
        $aside->news = $news;
        $aside->auth = $auth;
        return $aside;
    }

    public function getAuth(){
        if($this->auth_user)    return $this->getUserPanel($this->auth_user);
        $auth = new Auth();
        $auth->action = URL::current("",true);
        $auth->auth_user = $this->auth_user;
        $auth->link_register = URL::get("register");
        $auth->link_remind = URL::get("remind");
        $auth->message = $this->fp->getSessionMessage("auth");
        return $auth;
    }

    public function getUserPanel($user){
        $up = new UserPanel();
        $up->user = $user;
        $up->logout = URL::get("logout");
        return $up;
    }

    public function getFooter(){
        $footer = new Footer();
        $footer->js = array("/js/app-dist.js", "/js/validator-dist.js");
        $footer->text = "Официальный сайт Лузинского сельского поселения &copy;";
        return $footer;
    }

    public function renderAdmin($content = "")
    {
        $params["aside"] = $this->getAdminAside();
        $params["user_panel"] = $this->getAdminUserPanel();
        $params["quick_links"] = $this->getQuickLinks();
        $params["content"] = $content;
        $this->view->render("admin/main", $params);
    }

    public function getAdminAside()
    {
        $aside = new AdminAside();
        $aside->navigation = array(
            array(
                "link" => "/admin/articles",
                "title" => "Статьи"
            ),
            array(
                "link" => "/admin/news",
                "title" => "Новости"
            ),
            array(
                "link" => "/admin/gallery",
                "title" => "Галерея"
            ),
            array(
                "link" => "/admin/pages",
                "title" => "Страницы"
            ),
            array(
                "link" => "/admin/users",
                "title" => "Пользователи"
            ),
            array(
                "link" => "/admin/docs",
                "title" => "Документы"
            )
        );
        $aside->user_panel = $this->getAdminUserPanel();
        return $aside;
    }

    private function getAdminUserPanel()
    {
        $up = new AdminUserPanel();
        $up->user_login = $this->auth_user->login;
        $up->avatar = $this->auth_user->avatar;
        return $up;
    }

    public function getQuickLinks()
    {
        $links = new QuickLinks();
        $links->links = array(
            array(
                "link" => "Связаться с программистом",
                "title" => "Связаться с программистом",
            )
        );
        return $links;
    }

    protected function accessDenied()
    {
        self::redirect(URL::get("access"));
    }

    final protected function getOffset($count_on_page)
    {
        return $count_on_page * ($this->getPage() - 1);
    }

    final protected function getPage(){

        if($this->request->page != null){
            $page = ($this->request->page)?$this->request->page:1;
            if($page < 1)   $this->notFound();
            return $page;
        }
        return 1;
    }

    final protected function getPagination($elements, $count_on_page, $url){
        $count_pages = ceil($elements/ $count_on_page);
        $active = $this->getPage();
        if($active >$count_pages && $active > 1) $this->notFound();
        $pagination = new Pagination();
        if(!$url) $url = URL::deletePage(URL::current());
        $pagination->url = $url;
        $pagination->url_page = URL::addTemplatePage($url);
        $pagination->count_elemments = $elements;
        $pagination->count_on_page = $count_on_page;
        $pagination->count_show_pages = 11;
        $pagination->active = $active;
        return $pagination;
    }

    protected function authUser()
    {
        $login = "";
        $password = "";
        $redirect = false;
        if($this->request->auth){
            $login = $this->request->login;
            $password = $this->request->password;
            $redirect = true;
        }
        $user = $this->fp->auth("auth","Users","authUser",$login, $password);
        if($user instanceof Users){
            if ($user->blocked == 1) {
                self::redirect(URL::get("block", "main"));
            }
            if($redirect) $this->redirect(URL::current());
            return $user;
        }
        return null;
    }
}