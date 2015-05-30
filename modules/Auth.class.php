<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 9:45
 */

class Auth extends AbstractModule{

    public function __construct(){
        parent::__construct(new View());
        $this->add("auth_user");
        $this->add("action");
        $this->add("message");
        $this->add("link_register");
        $this->add("link_remind");
    }

    public function getTmplFile()
    {
        return "auth";
    }
}