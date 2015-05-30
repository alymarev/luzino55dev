<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 04.01.2015
 * Time: 0:04
 */
class ImagesList extends AbstractModule
{

    public function __construct()
    {
        parent::__construct(new View());
        $this->add("data");
    }

    public function getTmplFile()
    {
        return "admin/ImageList";
    }
}