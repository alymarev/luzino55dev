<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 18:53
 */
class IPValidator extends AbstractValidator
{

    protected function validate()
    {
        if ($this->data == 0) return;
        if (!preg_match("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/", $this->data)) $this->setError(self::CODE_UNKNOWN);
    }
}