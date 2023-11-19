<?php

namespace KarimTarekDev\Weightify;

use Exception;

class Weightify
{
    private array $units = ['kg', 'pound', 'ounce', 'gram'];

    private function convertToKg($value, $unit)
    {
        switch ($unit) {
            case 'pound':
                return $value * 0.453592;
            case 'ounce':
                return $value * 0.0283495;
            case 'gram':
                return $value * 0.001;
            case 'kg':
            default:
                return $value;
        }
    }

    private function convertFromKg($value, $unit)
    {
        switch ($unit) {
            case 'pound':
                return $value / 0.453592;
            case 'ounce':
                return $value / 0.0283495;
            case 'gram':
                return $value / 0.001;
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

    /**
     * @throws Exception
     */
    public function autoConvert($input)
    {
        preg_match('/([\d\.]+)\s*([a-zA-Z]+)/', $input, $matches);
        if (count($matches) < 3) {
            throw new Exception("Invalid format. Please use 'value unit'.");
        }

        $value = floatval($matches[1]);
        $unit = strtolower($matches[2]);

        // Find the closest matching unit
        $closestUnit = null;
        $shortestDistance = PHP_INT_MAX;
        foreach ($this->units as $possibleUnit) {
            $levDistance = levenshtein($unit, $possibleUnit);
            if ($levDistance < $shortestDistance) {
                $shortestDistance = $levDistance;
                $closestUnit = $possibleUnit;
            }
        }

        if ($closestUnit === null) {
            throw new Exception("Unknown unit: $unit");
        }

        return $this->convert($value, $closestUnit, 'kg');
    }
}
