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
        $this->assertEquals('I', $this->converter->getNumeral(1, 1));
        $this->assertEquals('V', $this->converter->getNumeral(5, 1));
        $this->assertEquals('X', $this->converter->getNumeral(10, 1));
        $this->assertEquals('L', $this->converter->getNumeral(50, 1));
        $this->assertEquals('C', $this->converter->getNumeral(100, 1));
        $this->assertEquals('D', $this->converter->getNumeral(500, 1));
        $this->assertEquals('M', $this->converter->getNumeral(1000, 1));
    }

    public function testNumberCanBeSplitToPositionalNotation()
    {
        $this->assertSame(
            [
                1000 => 2,
                100 => 0,
                10 => 1,
                1 => 8
            ],
            $this->converter->getPositionalNotation(2018)
        );
    }

    public function testConvertToNumerals()
    {
        $this->assertEquals(
            'MMXVIII',
            $this->converter->convertToRomanNumerals(2018)
        );
    }

}