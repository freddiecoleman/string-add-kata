<?php

class StringCalculator
{
    public function add($string)
    {
        $numbers = explode(',', $string);
        $total = 0;

        foreach ($numbers as $number)
        {
            if ($number < 0) throw new InvalidArgumentException;
            if ($number < 1000) $total += $number;
        }

        return $total;
    }

}
