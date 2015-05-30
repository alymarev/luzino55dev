<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 19:52
 */
class TitleValidator extends AbstractValidator
{

    const MAX_LENGTH = 100;
    const CODE_EMPTY = "ERROR_TITLE_EMPTY";
    const CODE_MAX_LENGTH = "ERROR_TITLE_MAX_LENGTH";

    protected function validate()
    {
        if (mb_strlen($this->data) == 0) $this->setError(self::CODE_EMPTY);
        elseif (mb_strlen($this->data) > self::MAX_LENGTH) $this->setError(self::CODE_MAX_LENGTH);
    }
}