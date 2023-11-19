<?php

namespace KarimTarekDev\Weightify\Tests;

use Exception;
use KarimTarekDev\Weightify\Weightify;
use PHPUnit\Framework\TestCase;

class WeightifyTest extends TestCase
{
    private Weightify $converter;

    protected function setUp(): void
    {
        $this->converter = new Weightify();
    }

    public static function conversionDataProvider(): array
    {
        return [
            ['kg', 'pound', 1, 2.20462],
            ['pound', 'kg', 2.20462, 1],
            ['gram', 'mg', 1, 1000],
            ['mg', 'microgram', 1, 1000],
            ['stone', 'pound', 1, 14],
            ['ounce', 'pound', 16, 1],
            ['metric_ton', 'kg', 1, 1000],
        ];
    }

    /**
     * @dataProvider conversionDataProvider
     * @throws Exception
     */
    public function testUnitConversions($fromUnit, $toUnit, $input, $expected)
    {
        $result = $this->converter->convert($input, $fromUnit, $toUnit);
        $this->assertEqualsWithDelta($expected, $result, 0.001, '');
    }

    public function testUnsupportedUnit()
    {
        $this->expectException(Exception::class);
        $this->converter->convert(1, 'unknown_unit', 'kg');
    }
}
