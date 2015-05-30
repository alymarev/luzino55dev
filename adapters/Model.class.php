<?php

abstract class Model extends AbstractModel {

    protected static $months = array(
        "01"=>"янв",
        "02"=>"фев",
        "03"=>"март",
        "04"=>"апр",
        "05"=>"май",
        "06"=>"июнь",
        "07"=>"июль",
        "08"=>"авг",
        "09"=>"сен",
        "10"=>"окт",
        "11"=>"ноя",
        "12"=>"дек");

    public function __construct($table) {
        parent::__construct($table, Config::FORMAT_DATE);
    }

    protected static function getMonth($date = false) {
        if ($date) $date = strtotime($date);
        else $date = time();
        return self::$months[date("m", $date) - 1];
    }

//    protected static function getDay()

    public function preEdit($field, $value) {
        return true;
    }

    public function postEdit($field, $value) {
        return true;
    }

    public function accessEdit($auth_user, $field) {
        return false;
    }

    public function accessDelete($auth_user) {
        return false;
    }

}

?>