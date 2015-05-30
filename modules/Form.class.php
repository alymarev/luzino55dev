<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 24.12.2014
 * Time: 12:39
 */

class Form extends AbstractModule{

    public function __construct(){
        parent::__construct(new View());
        $this->add("name");
        $this->add("action");
        $this->add("method", "post");
        $this->add("header");
        $this->add("message");
        $this->add("check", true);
        $this->add("enctype");
        $this->add("inputs", null, true);
        $this->add("jsv", null, true);
    }

    public function text($name, $label = "", $value = "", $default_v = "")
    {
        $this->input($name, "text", $label, $value, $default_v);
    }

    private function input($name, $type, $label, $value = false, $default_v = false)
    {
        $cl = new stdClass();
        $cl->name = $name;
        $cl->type = $type;
        $cl->label = $label;
        $cl->value = $value;
        $cl->default_v = $default_v;
        $this->inputs = $cl;
    }

    public function password($name, $label = "", $default_v = "")
    {
        $this->input($name, "password", $label, "", $default_v);
    }

    public function captcha($name, $label)
    {
        $this->input($name, "captcha", $label);
    }

    public function file($name, $label)
    {
        $this->input($name, "file", $label);
    }

    public function hidden($name, $value)
    {
        $this->input($name, "hidden", "", $value);
    }

    public function submit($value, $name = false)
    {
        $this->input($name, "submit", "", $value);
    }

    public function email($name,$label){
        $this->input($name,"email",$label);
    }

    public function checkbox($name,$label){
        $this->input($name,"text",$label);
    }

    public function radio($name, $label, $values = array())
    {
        $this->input($name, "radio", $label, $values);
    }

    public function date($name,$label){
        $this->input($name,"date",$label);
    }

    public function textView($name, $label, $value = "")
    {
        $this->input($name, "textview", $label, $value);
    }

    public function section($name, $label, $value = array(), $default = "")
    {
        $this->input($name, "section", $label, $value, $default);
    }

    public function addJSV($field, $jsv)
    {
        $this->addObj("jsv", $field, $jsv);
    }

    public function getTmplFile()
    {
        return "form";
    }
}