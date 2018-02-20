<?php declare(strict_types=1);

namespace Kata;

/**
 * Class NumeralConverter
 * @package Kata
 */
class NumeralConverter
{
    private $mapping = [
        1 => 'I',
        4 => 'IV',
        5 => 'V',
        9 => 'IX',
        10 => 'X',
        40 => 'XL',
        50 => 'L',
        90 => 'XC',
        100 => 'C',
        400 => 'CD',
        500 => 'D',
        900 => 'CM',
        1000 => 'M',
    ];

    private $positionalNotationMapping = [
        1 => 1,
        2 => 10,
        3 => 100,
        4 => 1000,
        5 => 10000
    ];

    public function convertToRomanNumerals(int $input) : string
    {
        $number = '';
        foreach(array_reverse($this->mapping, true) as $key => $numeral)
        {
            while($input >= $key)
            {
                $input -= $key;
                $number .= $numeral;
            }
        }


        return $number;
    }
}