<?php

class Articles extends Model {

    protected static $table = "articles";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("title", "TitleValidator");
        $this->add("full", "TextValidator");
        $this->add("intro", "TextValidator");
        $this->add("section_id", "IDValidator");
        $this->add("views", "IDValidator", null, 0);
        $this->add("date", "DateValidator", self::TYPE_TIMESTAMP, $this->getDate());
        $this->add("meta_desc", "MDValidator");
        $this->add("meta_key", "MKValidator"/*,null, $this->addKeywords()*/);
        $this->add("images", "ImageValidator");
    }

    public static function getAllShow($count = false, $offset = false, $post_handling = false)
    {
        $select = self::getBaseSelect();
        $select->order("date", false);
        if ($count) $select->limit($count, $offset);
        $data = self::$db->select($select);
        $articles = Model::buildMultiple(__CLASS__, $data);
        if ($post_handling) foreach ($articles as $article) $article->postHandling();
        return $articles;
    }

    private static function getBaseSelect()
    {
        $select = new Select(self::$db);
        $select->from(self::$table, "*");
        return $select;
    }

    public static function getAllOnPageAndSectionID($section_id, $count, $offset = false)
    {
        $select = self::getBaseSelect();
        $select->order("date", false)
            ->where("`section_id` = " . self::$db->getSQ(), array($section_id))
            ->limit($count, $offset);

        $data = self::$db->select($select);
        $articles = Model::buildMultiple(__CLASS__, $data);
        foreach ($articles as $article) $article->postHandling();
        return $articles;
    }

    public static function getAllOnSectionID($section_id, $order = false, $offset = false)
    {
        return self::getAllOnSectionOrCategory("section_id", $section_id, $order, $offset);
    }

    private static function getAllOnSectionOrCategory($field, $value, $order, $offset)
    {
        $select = self::getBaseSelect();
        $select->where("`$field` = " . self::$db->getSQ(), array($value))
            ->order("date", $order);
        $data = self::$db->select($select);
        $articles = Model::buildMultiple(__CLASS__, $data);
        return $articles;
    }

    public static function getAllOnCatID($cat_id, $order = false, $offset = false) {
        return self::getAllOnSectionOrCategory("cat_id", $cat_id, $order, $offset);
    }

    public static function search($words)
    {
        $select = self::getBaseSelect();
        $articles = self::searchObjects($select, __CLASS__, array("title", "full"), $words, Config::MIN_SEARCH_LENGTH);
        return $articles;
    }

    public function loadPrevArticle($article_db) {
        $select = self::getBaseNeighbourSelect($article_db);
        $select->where("`id` < ".self::$db->getSQ(), array($article_db->id))
            ->order("date", false);
        $row = self::$db->selectRow($select);
        return $this->init($row);
    }

    private static function getBaseNeighbourSelect($article_db)
    {
        $select = self::getBaseSelect();
        $select->where("`cat_id` = " . self::$db->getSQ(), array($article_db->cat_id))
            ->order("date")
            ->limit(1);
        return $select;
    }

    public function loadNextArticle($article_db) {
        $select = self::getBaseNeighbourSelect($article_db);
        $select->where("`id` > ".self::$db->getSQ(), array($article_db->id));
        $row = self::$db->selectRow($select);
        return $this->init($row);
    }

    protected function postInit()
    {
        if (!is_null($this->images)) $this->images = Config::DIR_AVATARS . $this->images;
        $this->full = htmlspecialchars_decode($this->full);
        $this->intro = htmlspecialchars_decode($this->intro);
        $this->date = $this->getDate($this->date);
        $this->link = URL::get("article", "", array("id" => $this->id));
        return true;
    }

    protected function postLoad()
    {
        $this->postHandling();
        return true;
    }

    private function postHandling()
    {
//        $this->setSectionAndCategory();
//        $this->count_comments = CommentDB::getCountOnArticleID($this->id);
//        $this->day_show = Model::getDay($this->date);
//        $this->month_show = Model::getMonth($this->date);
    }

    protected function preValidate()
    {
        if (!is_null($this->img)) $this->img = basename($this->img);
        return true;
    }

    private function setSectionAndCategory() {
        $section = new SectionDB();
        $section->load($this->section_id);
        $category = new CategoryDB();
        $category->load($this->cat_id);
        if ($section->isSaved()) $this->section = $section;
        if ($category->isSaved()) $this->category = $category;

    }

    public function addVisitor(){
        $this->views = $this->views + 1;
        $this->save();
    }
}

?>