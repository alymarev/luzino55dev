<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 15.12.2014
 * Time: 19:45
 */

class NewsModel extends Model{
    public static $table = "news";
    public function __construct(){
        parent::__construct(self::$table);
        $this->add("title", "TitleValidator");
        $this->add("text", "TextValidator");
        $this->add("date","DateValidator",self::TYPE_TIMESTAMP,$this->getDate());
    }

    public static function getLastNews(){
        return self::getAll(3);
    }

    protected function postInit(){
        $this->date = $this->getDate($this->date);
        $array = explode(".",$this->date);
        $this->date = array(
            "day" => $array[0],
            "month" => Model::$months[$array[1]]
        );
        $this->text = htmlspecialchars_decode($this->text);
    }

    protected function postLoad() {
        $this->postHandling();
        return true;
    }

    private function postHandling() {
        $this->day_show = Model::getDay($this->date);
        $this->month_show = Model::getMonth($this->date);
    }
}