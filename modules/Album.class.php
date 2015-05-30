<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 04.01.2015
 * Time: 12:06
 */
class Album extends AbstractModule
{
    public function __construct()
    {
        parent::__construct(new View());
        $this->add("images");
    }


    public function getTmplFile()
    {
        return "album";
    }
}