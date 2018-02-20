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
        foreach($this->getPositionalNotation($input) as $digit => $value)
        {
            $number .= $this->getNumeral($digit, $value);
        }
        return $number;
    }

    public function getNumeral(int $digit, int $value) : string
    {
        $romanNumeral = '';
        while($value > 0)
        {
            $romanNumeral .= $this->mapping[$digit];
            $value--;
        }

        return $romanNumeral;
    }

    public function getPositionalNotation(int $input) : array
    {
        $intLength = $this->countDigits($input);
        $positionalNotationOfInput = [];
        foreach($this->splitNumber($input) as $digit)
        {
            $positionalNotationOfInput[$this->positionalNotationMapping[$intLength]] = (int)$digit;
            $intLength--;
        }

        return $positionalNotationOfInput;
    }

    private function countDigits(int $input) : int
    {
        $length = 1;
        while ($input >= 10)
        {
            $input = ($input / 10);
            $length++;
        }

        return $length;
    }

    private function splitNumber(int $input)
    {
        return str_split((string)$input);
    }
}