<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 8:50
 */

class Select extends AbstractSelect {
    public function __construct(){
        parent::__construct(new DataBase());
    }
}