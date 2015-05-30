<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 24.12.2014
 * Time: 12:08
 */

class EditProfile extends AbstractModule{
    public function __construct()
    {
        parent::__construct(new View());
    }


    public function getTmplFile()
    {
        return "editProfile";
    }
}