<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 20:20
 */
class FamilyValidator extends AbstractValidator
{
    const MAX_LENGTH = 100;
    const CODE_EMPTY = "ERROR_FAMILY_EMPTY";
    const CODE_INVALID = "ERROR_FAMILY_INVALID";
    const CODE_MAX_LENGTH = "ERROR_FAMILY_MAX_LENGTH";

    protected function validate()
    {
//        if (mb_strlen($this->data) == 0) $this->setError(self::CODE_EMPTY);
//        else {
            if (mb_strlen($this->data) > self::MAX_LENGTH) $this->setError(self::CODE_MAX_LENGTH);
            elseif ($this->isContainQuotes($this->data)) $this->setError(self::CODE_INVALID);
//        }
    }

}