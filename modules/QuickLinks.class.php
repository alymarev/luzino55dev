<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 01.01.2015
 * Time: 19:53
 */
class QuickLinks extends AbstractModule
{
    public function __construct()
    {
        parent::__construct(new View());
        $this->add("links", null, true);
    }


    public function getTmplFile()
    {
        return "admin/quick";
    }
}