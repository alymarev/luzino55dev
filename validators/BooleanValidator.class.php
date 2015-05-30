<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 18:41
 */
class BooleanValidator extends AbstractValidator
{

    protected function validate()
    {
        if ($this->data != 0 && $this->data != 1) $this->setError(self::CODE_UNKNOWN);
    }
}