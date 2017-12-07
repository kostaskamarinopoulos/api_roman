<?php

namespace App;

class IntegerConversion
{
    /**
     * Convert integer to Roman code
     */
    public function toRomanNumerals($number)
    {
    	$resp = '';
        foreach (static::$lookup as $limit => $glyph)
        {
            if (floor($number / $limit) > 0)
            {
                $count = floor($number / $limit);
                $resp .= str_repeat($glyph, $count);
                $number -= $limit * $count;
            }
        } 

        return $resp;
    }      

    protected static $lookup = [
        1000 => 'M',
        900  => 'CM',
        500  => 'D',
        400  => 'CD',
        100  => 'C',
        90   => 'XC',
        50   => 'L',
        40   => 'XL',
        10   => 'X',
        9    => 'IX',
        5    => 'V',
        4    => 'IV',
        1    => 'I'
    ];
}
