<?php

/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 26.12.2014
 * Time: 22:25
 */
class JSValidator
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function password($f_equal = false, $min_len = true, $t_empty = false)
    {
        $cl = $this->getBase();
        if ($min_len) {
            $cl->min_len = PasswordValidator::MIN_LENGTH;
            $cl->t_min_len = $this->message->get(PasswordValidator::CODE_MIN_LENGTH);
        }
        $cl->max_len = PasswordValidator::MAX_LENGTH;
        $cl->t_max_len = $this->message->get(PasswordValidator::CODE_MAX_LENGTH);
        if ($t_empty) $cl->t_empty = $this->message->get($t_empty);
        else $cl->t_empty = $this->message->get(PasswordValidator::CODE_EMPTY);
        if ($f_equal) {
            $cl->f_equal = $f_equal;
            $cl->t_equal = $this->message->get("ERROR_PASSWORD_CONF");
        }
        return $cl;
    }

    private function getBase()
    {
        $cl = new stdClass();
        $cl->type = "";
        $cl->min_len = "";
        $cl->max_len = "";
        $cl->t_min_len = "";
        $cl->t_max_len = "";
        $cl->t_empty = "";
        $cl->t_type = "";
        $cl->f_equal = "";
        $cl->t_equal = "";
        return $cl;
    }

    public function name($t_empty = false, $t_max_len = false, $t_type = false)
    {
        return $this->getBaseData($t_empty, $t_max_len, $t_type, "NameValidator", "name");
    }

    private function getBaseData($t_empty, $t_max_len, $t_type, $class, $type)
    {
        $cl = $this->getBase();
        $cl->type = $type;
        $cl->max_len = $class::MAX_LENGTH;

        if ($t_empty) $cl->t_empty = $this->message->get($t_empty);
        else $cl->t_empty = $this->message->get($class::CODE_EMPTY);
        if ($t_max_len) $cl->t_max_len = $this->message->get($t_max_len);
        else $cl->t_max_len = $this->message->get($class::CODE_MAX_LENGTH);
        if ($t_type) $cl->t_type = $this->message->get($t_type);
        else $cl->t_type = $this->message->get($class::CODE_INVALID);
        return $cl;
    }

    public function login($t_empty = false, $t_max_len = false, $t_type = false)
    {
        return $this->getBaseData($t_empty, $t_max_len, $t_type, "LoginValidator", "login");
    }

    public function family($t_empty = false, $t_max_len = false, $t_type = false)
    {
        return $this->getBaseData($t_empty, $t_max_len, $t_type, "FamilyValidator", "family");
    }

    public function email($t_empty = false, $t_max_len = false, $t_type = false)
    {
        return $this->getBaseData($t_empty, $t_max_len, $t_type, "EmailValidator", "email");
    }

    public function avatar()
    {
        $cl = $this->getBase();
        $cl->t_empty = $this->message->get("ERROR_AVATAR_EMPTY");
        return $cl;
    }

    public function captcha()
    {
        $cl = $this->getBase();
        $cl->t_empty = $this->message->get("ERROR_CAPTCHA_EMPTY");
        return $cl;
    }
}