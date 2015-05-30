<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 03.01.2015
 * Time: 15:52
 */
class Albums extends Model
{
    public static $table = "albums";

    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("title", "TitleValidator");
        $this->add("main_image", "ImageValidator");
    }

    public function loadOnTitle($title)
    {
        return self::getAllOnField(self::$table, __CLASS__, "title", $title);
    }

    public function postInit()
    {
        $this->main_image = Config::DIR_GALLERY . $this->main_image;
    }


}