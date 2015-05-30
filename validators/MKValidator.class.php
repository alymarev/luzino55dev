<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 19:04
 */

class MKValidator extends AbstractValidator{

    const MAX_LENGTH = 255;
    const CODE_EMPTY = "ERROR_MK_EMPTY";
    const CODE_MAX_LENGTH = "ERROR_MK_MAX_LENGTH";

    protected function validate()
    {
        if (mb_strlen($this->data) == 0) $this->setError(self::CODE_EMPTY);
        if (mb_strlen($this->data) > self::MAX_LENGTH) $this->setError(self::CODE_MAX_LENGTH);
    }
}