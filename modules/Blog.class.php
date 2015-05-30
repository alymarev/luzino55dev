<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 16.12.2014
 * Time: 11:51
 */

class Blog extends AbstractModule{
    public function __construct(){
        parent::__construct(new View());
        $this->add("articles");
        $this->add("pagination");
    }

    public function getTmplFile()
    {
        return "blog";
    }
}