<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 27.12.2014
 * Time: 18:52
 */
class ImageValidator extends AbstractValidator
{

    protected function validate()
    {
        if (!is_null($this->data) && !preg_match("/^[a-z0-9-_]+\.(JPG|JPEG|PNG|GIF|jpg|jpeg|png|gif)$/i", $this->data)) $this->setError(self::CODE_UNKNOWN);
    }
}