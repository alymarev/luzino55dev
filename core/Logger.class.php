<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 05.05.2015
 * Time: 23:28
 */

class Logger {
    function __construct()
    {
       $file = file_get_contents(Config::SITE_ADDRESS.Config::LOG_FILE);
    }

    public static function log($var, $clear=FALSE, $path=NULL){
        if ($var) {
        $date = '====== '.date('Y-m-d H:i:s')." =====\n";
        $result = $var;
        if (is_array($var) || is_object($var)) {
            $result = print_r($var, 1);
        }
        $result .="\n";
        if(!$path)
            $path = dirname($_SERVER['SCRIPT_FILENAME']) . '/mylog.txt';
            echo $path;
//            exit();
        if($clear)
            file_put_contents($path, '');
        @error_log($date.$result, 3, $path);
        return true;
    }
        return false;
    }

}