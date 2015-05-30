<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 19:10
 */

class PasswordValidator extends AbstractValidator{

    const MIN_LENGTH = 6;
    const MAX_LENGTH = 100;
    const CODE_EMPTY = "ERROR_PASSWORD_EMPTY";
    const CODE_CONTENT = "ERROR_PASSWORD_CONTENT";
    const CODE_MIN_LENGTH = "ERROR_PASSWORD_MIN_LENGTH";
    const CODE_MAX_LENGTH = "ERROR_PASSWORD_MAX_LENGTH";

    protected function validate()
    {
        if (mb_strlen($this->data) == 0) $this->setError(self::CODE_EMPTY);
        else {
            if (mb_strlen($this->data) < self::MIN_LENGTH) $this->setError(self::CODE_MIN_LENGTH);
            elseif (mb_strlen($this->data) > self::MAX_LENGTH) $this->setError(self::CODE_MAX_LENGTH);
            elseif (!preg_match("/^[a-z0-9_]+$/i", $this->data)) $this->setError(self::CODE_CONTENT);
        }
    }
}