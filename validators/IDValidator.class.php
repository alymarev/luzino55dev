<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 18:50
 */

class IDValidator extends AbstractValidator{

    protected function validate()
    {
        if ((int)$this->data < 0) $this->setError(self::CODE_UNKNOWN);
    }
}