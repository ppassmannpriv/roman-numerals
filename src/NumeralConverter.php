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
        5 => 'V',
        10 => 'X',
        50 => 'L',
        100 => 'C',
        500 => 'D',
        1000 => 'M',
    ];

    private $positionalNotationMapping = [
        1 => 1,
        2 => 10,
        3 => 100,
        4 => 1000,
        5 => 10000
    ];

    public function getNumeral(int $input) : string
    {
        return $this->mapping[$input];
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