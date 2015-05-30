<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 19:54
 */

class URLValidator extends AbstractValidator{

    const MAX_LENGTH = 255;

    protected function validate()
    {
//        if (mb_strlen($this->data) > self::MAX_LENGTH) $this->setError(self::CODE_UNKNOWN);
//        else {
//            $pattern = "~^(?:/[a-z0-9.,_@%&?+=\~/-]*)?(?:#[^ '\"&<>]*)?$~i";
//            if (!preg_match($pattern, $this->data)) $this->setError(self::CODE_UNKNOWN);
//        }
    }
}