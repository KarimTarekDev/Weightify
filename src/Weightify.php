<?php

namespace KarimTarekDev\Weightify;

use Exception;

class Weightify
{
    private array $units = ['metric_ton', 'kg', 'gram', 'mg', 'microgram', 'stone', 'pound', 'ounce'];

    private function convertToKg($value, $unit)
    {
        switch ($unit) {
            case 'metric_ton':
                return $value * 1000;    // 1 metric ton = 1000 kg
            case 'gram':
                return $value * 0.001;   // 1 gram = 0.001 kg
            case 'mg':
                return $value * 1e-6;    // 1 milligram = 1e-6 kg
            case 'microgram':
                return $value * 1e-9;    // 1 microgram = 1e-9 kg
            case 'stone':
                return $value * 6.35;    // 1 stone = 6.35 kg
            case 'pound':
                return $value * 0.453592;// 1 pound = 0.453592 kg
            case 'ounce':
                return $value * 0.0283495;// 1 ounce = 0.0283495 kg
            case 'kg':
            default:
                return $value;
        }
    }

    private function convertFromKg($value, $unit)
    {
        switch ($unit) {
            case 'metric_ton':
                return $value / 1000;    // 1 kg = 1/1000 metric ton
            case 'gram':
                return $value / 0.001;   // 1 kg = 1000 grams
            case 'mg':
                return $value / 1e-6;    // 1 kg = 1e6 milligrams
            case 'microgram':
                return $value / 1e-9;    // 1 kg = 1e9 micrograms
            case 'stone':
                return $value / 6.35;    // 1 kg = 1/6.35 stones
            case 'pound':
                return $value / 0.453592;// 1 kg = 1/0.453592 pounds
            case 'ounce':
                return $value / 0.0283495;// 1 kg = 1/0.0283495 ounces
            case 'kg':
            default:
                return $value;
        }
    }

    /**
     * @throws Exception
     */
    public function convert($value, $fromUnit, $toUnit)
    {
        if (! in_array($fromUnit, $this->units) || ! in_array($toUnit, $this->units)) {
            throw new Exception("Unsupported unit.");
        }

        $valueInKg = $this->convertToKg($value, $fromUnit);

        return $this->convertFromKg($valueInKg, $toUnit);
    }
}
