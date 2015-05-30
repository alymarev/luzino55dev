<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 01.01.2015
 * Time: 18:10
 */
class AdminAside extends AbstractModule
{

    public function __construct()
    {
        parent::__construct(new View());
        $this->add("navigation");
        $this->add("images");
        $this->add("user_panel");
    }

    public function getTmplFile()
    {
        return "admin/aside";
    }
}