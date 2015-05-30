<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 03.01.2015
 * Time: 14:49
 */
class AdminUserList extends AbstractModule
{
    public function __construct()
    {
        parent::__construct(new View());
        $this->add("data");
        $this->add("type");
    }


    public function getTmplFile()
    {
        return "admin/userlist";
    }
}