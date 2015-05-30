<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 22.12.2014
 * Time: 22:41
 */

class UserPanel extends AbstractModule{
    public function __construct()
    {
        parent::__construct(new View());
        $this->add("user");
        $this->add("logout");
    }


    public function getTmplFile()
    {
        return "user_panel";
    }
}