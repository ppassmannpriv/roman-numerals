<?php declare(strict_types=1);

namespace Kata\Tests;

use Kata\NumeralConverter;

class NumeralConverterTest extends \PHPUnit_Framework_TestCase
{
    protected $converter;

    public function setUp()
    {
        $this->converter = new NumeralConverter;
    }

    public function testMappingOfRomanNumeralsIsCorrect()
    {
        $this->assertEquals('I', $this->converter->convertToRomanNumerals(1));
        $this->assertEquals('VI', $this->converter->convertToRomanNumerals(6));
        $this->assertEquals('X', $this->converter->convertToRomanNumerals(10));
        $this->assertEquals('LVII', $this->converter->convertToRomanNumerals(57));
        $this->assertEquals('CXC', $this->converter->convertToRomanNumerals(190));
        $this->assertEquals('D', $this->converter->convertToRomanNumerals(500));
        $this->assertEquals('MMCMXC', $this->converter->convertToRomanNumerals(2990));
    }

    public function testConvertToNumerals()
    {
        $this->assertEquals(
            'MMXVIII',
            $this->converter->convertToRomanNumerals(2018)
        );
    }

}