<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 03.01.2015
 * Time: 15:52
 */
class Docs extends Model
{
    public static $table = "docs";

    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("title", "TitleValidator");
        $this->add("link", "URLValidator");
    }

    public function loadOnTitle($title)
    {
        return self::getAllOnField(self::$table, __CLASS__, "title", $title);
    }

    public function loadOnLink($link){
        return self::getAllOnField(self::$table, __CLASS__,"link", $link);
    }

    public function postInit()
    {
        $this->link = Config::SITE_ADDRESS."docs/".$this->link;
        $this->main_image = Config::DIR_GALLERY . $this->main_image;
    }


}