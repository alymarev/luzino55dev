<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 01.01.2015
 * Time: 19:33
 */
class AdminUserPanel extends AbstractModule
{
    public function __construct()
    {
        parent::__construct(new View());
        $this->add("user_login");
        $this->add("avatar");
    }


    public function getTmplFile()
    {
        return "admin/user_panel";
    }
}