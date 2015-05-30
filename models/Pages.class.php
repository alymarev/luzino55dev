<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 11.11.2014
 * Time: 13:15
 */

class Pages extends Model{
    public static $table = "pages";
    function __construct()
    {
        parent::__construct("pages");
        $this->add("title", "TitleValidator");
        $this->add("link", "URLValidator");
        $this->add("parent_id","IDValidator");
    }

    public static function getPages(){
        $pages = self::getAllOnField(self::$table,__CLASS__,"parent_id","0");
        return $pages;
    }

    public static function getChilds($parent_id){
        $childs = self::getAllOnField(self::$table,__CLASS__,"parent_id",$parent_id);
        return $childs;

    }


} 