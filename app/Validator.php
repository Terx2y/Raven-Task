<?php

namespace app;

class Validator extends \GUMP
{
    public $err_set = array();

    public function check($data, $rules)
    {
        $this->err_set = self::is_valid($data, $rules);

        if($this->err_set === true)
        {
            return true;
        }
    }

    public function errorMessages()
    {
        return $this->err_set;
    }
}