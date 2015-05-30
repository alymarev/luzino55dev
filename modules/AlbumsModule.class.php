<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 04.01.2015
 * Time: 10:20
 */
class AlbumsModule extends AbstractModule
{
    public function __construct()
    {
        parent::__construct(new View());
        $this->add("data");
    }


    public function getTmplFile()
    {
        return "gallery";
    }
}