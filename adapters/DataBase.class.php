<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 07.11.2014
 * Time: 10:00
 */

class DataBase extends AbstractDataBase{
    public function __construct(){
        parent::__construct(Config::DB_HOST,Config::DB_USER,Config::DB_PASS,Config::DB_NAME,Config::SECRET_SYMBOL,Config::DB_PREFIX);
    }
} 