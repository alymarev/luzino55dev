<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 17:28
 */
class HashValidator extends AbstractValidator
{

    const MAX_LENGTH = 100;

    protected function validate()
    {
        if (mb_strlen($this->data) > self::MAX_LENGTH) $this->setError(self::CODE_UNKNOWN);
    }
}