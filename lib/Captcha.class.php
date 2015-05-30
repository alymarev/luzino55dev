<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 23.12.2014
 * Time: 21:45
 */
class Captcha
{
    const WIDTH = 250;
    const HEIGHT = 120;
    const FONT_SIZE = 32;
    const BG_AMOUNT = 30;
    const COUNT = 4;
    const FONT = "fonts/ITALO_light.ttf";

    private static $letters = array();
    private static $colors = array(90,115,257,150,200,75);


    public static function generate(){
        session_start();
        self::$letters = explode("/", "a/b/c/d/e/f/g/h/i/j/k/l/m/n/p/q/r/s/t/u/v/w/x/y/z/1/2/3/4/5/6/7/8/9");
        $code = "";
        $src = imagecreatetruecolor(self::WIDTH,self::HEIGHT);
        $bg = imagecolorallocate($src,255,255,255);
        imagefill($src,0,0,$bg);
        for($i = 0;$i < self::BG_AMOUNT;$i++){
            $color = imagecolorallocatealpha($src,rand(0,255),rand(0,255),rand(0,255),100);
            $letter = self::$letters[rand(0,count(self::$letters)-1)];
            $size = rand(self::FONT-2,self::FONT+2);
            imagettftext($src,$size,rand(0,30),rand(self::WIDTH*0.1,self::WIDTH*0.9),rand(self::WIDTH*0.1,self::WIDTH*0.9),$color,self::FONT,$letter);
        }
        for($i = 0;$i < self::COUNT;$i++){
            $color= imagecolorallocatealpha($src,self::$colors[rand(0,count(self::$colors)-1)],self::$colors[rand(0,count(self::$colors)-1)],self::$colors[rand(0,count(self::$colors)-1)],rand(20,40));
            $letter = self::$letters[rand(0,count(self::$letters) - 1)];
            $size = rand(self::FONT_SIZE*2-2,self::FONT_SIZE*2+2);
            $x = ($i + 1) * self::FONT_SIZE + rand(1,5);
            $y = self::HEIGHT*2/3+rand(0,5);
            imagettftext($src,$size,rand(0,15),$x,$y,$color,self::FONT,$letter);
            $code .= $letter;
        }
        $_SESSION['session_code'] = $code;
        header("Content-type: image/gif");
        imagegif($src);
    }

    public static function check($code){
        if (!session_id()) session_start();
        return ($code === $_SESSION['session_code']);
    }

}