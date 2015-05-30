<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 03.01.2015
 * Time: 23:09
 */
class Images extends Model
{
    public static $table = "images";

    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("link", "ImageValidator");
        $this->add("album_id", "IDValidator");
    }

    public static function getImageOnAlbumID($id)
    {
        $data = self::getAllOnAlbumID($id);
        return $data[0];
    }

    public static function getAllOnAlbumID($id)
    {
        return self::getAllOnField(self::$table, __CLASS__, "album_id", $id);
    }

    public function postInit()
    {
        $this->link = Config::DIR_GALLERY . $this->link;
    }

}