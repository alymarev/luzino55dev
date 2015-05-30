<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 19:48
 */
class TextValidator extends AbstractValidator
{

    const MAX_LENGTH = 50000;
    const CODE_EMPTY = "ERROR_TEXT_EMPTY";
    const CODE_MAX_LENGTH = "ERROR_TEXT_MAX_LENGTH";

    protected function validate()
    {
        if (mb_strlen($this->data) == 0) $this->setError(self::CODE_EMPTY);
        elseif (mb_strlen($this->data) > self::MAX_LENGTH) $this->setError(self::CODE_MAX_LENGTH);
    }
}