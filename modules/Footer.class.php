<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 9:30
 */

class Footer extends AbstractModule{


    public function __construct(){
        parent::__construct(new View());
        $this->add("text");
        $this->add("year",date("Y"));
        $this->add("js",null,true);
    }

    public function getTmplFile()
    {
        return "footer";
    }
}