<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 9:27
 */

class PageMessage extends AbstractModule {


    public function __construct(){
        parent::__construct(new View());
        $this->add("header");
        $this->add("code");
        $this->add("text");

    }

    public function getTmplFile()
    {
        return "message";
    }
}