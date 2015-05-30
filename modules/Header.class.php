<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 21.11.2014
 * Time: 17:35
 */

class Header extends AbstractModule {
    private $title;

    public function __construct(){
        parent::__construct(new View());
        $this->add("title");
    }

    public function getTmplFile()
    {
        return "header";
    }
}