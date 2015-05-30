<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 01.01.2015
 * Time: 20:24
 */
class AdminList extends AbstractModule
{
    public function __construct()
    {
        parent::__construct(new View());
        $this->add("data");
        $this->add("type");
        $this->add("text");
        $this->add("functions", null, true);
    }

    public function getTmplFile()
    {
        return "admin/list";
    }
}