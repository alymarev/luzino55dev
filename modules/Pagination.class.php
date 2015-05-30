<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 16.12.2014
 * Time: 21:13
 */

class Pagination extends AbstractModule{


    public function __construct(){
        parent::__construct(new View());
        $this->add("url");
        $this->add("url_page");
        $this->add("count_elemments");
        $this->add("count_show_pages");
        $this->add("count_on_page");
        $this->add("active");
    }

    public function getTmplFile()
    {
        return "pagination";
    }
}