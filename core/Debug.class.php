<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 09.05.2015
 * Time: 15:14
 */

class Debug {
    public static function printArray($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}