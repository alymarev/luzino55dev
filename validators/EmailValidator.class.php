<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 18:46
 */

class EmailValidator extends AbstractValidator{

    const MAX_LENGTH = 100;
    const CODE_EMPTY = "ERROR_EMAIL_EMPTY";
    const CODE_INVALID = "ERROR_EMAIL_INVALID";
    const CODE_MAX_LENGTH = "ERROR_EMAIL_MAX_LENGTH";

    protected function validate()
    {
        $data = $this->data;
        if (mb_strlen($data) == 0) $this->setError(self::CODE_EMPTY);
        else {
            if (mb_strlen($data) > self::MAX_LENGTH) $this->setError(self::CODE_MAX_LENGTH);
            else {
                $pattern = "/^[a-z0-9_][a-z0-9\._-]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+$/i";
                if (!preg_match($pattern, $data)) $this->setError(self::CODE_INVALID);
            }
        }
    }
}