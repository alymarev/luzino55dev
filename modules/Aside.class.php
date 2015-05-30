<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 19:21
 */

class Aside extends AbstractModule{

    public function __construct(){
        parent::__construct(new View());
        $this->add("menu");
        $this->add("news");
        $this->add("auth");
    }

    public function getTmplFile()
    {
        return "aside";
    }
}