<?php

namespace app;


class Validator extends \GUMP
{
    public function check($data, $rules)
    {
        $checker = self::is_valid($data, $rules);

        if($checker === true)
        {
            return true;
        }
        else {

            for ($i = 0; $i < count($this->errors = $checker); $i++)
            {
                echo "<p>" . $this->errors[$i] . "</p>";
            }
        }
    }
}