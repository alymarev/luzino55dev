<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 9:40
 */

class Article extends AbstractModule{

    public function __construct(){
        parent::__construct(new View());
        $this->add("article");
    }

    public function getTmplFile()
    {
        return "article_full";
    }
}