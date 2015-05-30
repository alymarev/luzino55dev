<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 21.11.2014
 * Time: 16:41
 */

class Head extends AbstractModule{
    public function __construct(){
        parent::__construct(new View());
        $this->add("css",null,true);
        $this->add("meta",null,true);
        $this->add("title");
    }

    public function meta($name, $content, $http_equiv) {
        $class = new stdClass();
        $class->name = $name;
        $class->content = $content;
        $class->http_equiv = $http_equiv;
        $this->meta = $class;
    }

    public function getTmplFile()
    {
        return "head";
    }
}