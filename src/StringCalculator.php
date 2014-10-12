<?php

class StringCalculator
{

    const MAX_NUMBER_ALLOWED = 1000;

    public function add($string)
    {
        $numbers = $this->parseNumbers($string);
        $total = 0;

        foreach ($numbers as $number)
        {
            $this->guardAgainstInvalidNumber($number);
            if ($number < self::MAX_NUMBER_ALLOWED) $total += $number;
        }

        return $total;
    }

    /**
     * @param $number
     */
    public function guardAgainstInvalidNumber($number)
    {
        if ($number < 0) throw new InvalidArgumentException("Invalid number provided: {$number}");
    }

    public function parseNumbers($string)
    {
        return array_map('intval', preg_split('/(\s*(,)|\\\n\s*)/', $string));
    }

}
