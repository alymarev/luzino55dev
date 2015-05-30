<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 19:42
 */

class News extends AbstractModule{


    public function __construct(){
        parent::__construct(new View());
        $this->add("news",null,true);
    }

    public function getTmplFile()
    {
        return "news";
    }
}