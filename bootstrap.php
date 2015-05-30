<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 11.11.2014
 * Time: 13:42
 */

mb_internal_encoding("UTF-8");

set_include_path(
    "home/luzino/luzino.ru/docs".PATH_SEPARATOR.
    "core".PATH_SEPARATOR.
    "controllers".PATH_SEPARATOR.
    "adapters".PATH_SEPARATOR.
    "lib".PATH_SEPARATOR.
    "models".PATH_SEPARATOR.
    "modules".PATH_SEPARATOR.
    "validators"
);

function __autoload($class){
    require_once "$class.class.php";
}

Model::setDB(new DataBase());