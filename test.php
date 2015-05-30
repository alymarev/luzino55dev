<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 23.11.2014
 * Time: 18:44
 */

require_once "bootstrap.php";
$news = NewsModel::getLastNews();

echo "<pre>";
print_r($news);
echo "</pre>";

