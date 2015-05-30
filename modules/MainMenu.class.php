<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 22.11.2014
 * Time: 21:10
 */

class MainMenu extends AbstractModule{
    public function __construct(){
        parent::__construct(new View());
        $this->add("pages",null,true);
        $this->add("childs",null,true);
    }

    public function getTmplFile()
    {
        return "menu";
    }
}