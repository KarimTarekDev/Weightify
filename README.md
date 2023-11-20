# Weightify: The Ultimate Weight Conversion Tool

[![Latest Version on Packagist](https://img.shields.io/packagist/v/karimtarekdev/weightify.svg?style=flat-square)](https://packagist.org/packages/karimtarekdev/weightify)
[![Tests](https://img.shields.io/github/actions/workflow/status/karimtarekdev/weightify/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/karimtarekdev/weightify/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/karimtarekdev/weightify.svg?style=flat-square)](https://packagist.org/packages/karimtarekdev/weightify)

<p align="center">
    <img src="https://i.imgur.com/NmcsUTp.png">
</p>

"Weightify: The Ultimate Weight Conversion Tool" is a streamlined and efficient PHP package for accurate weight conversions. It supports a wide array of units such as Metric tons, Kilograms, Grams, Milligrams, Micrograms, Stones, Pounds, and Ounces, making it an ideal solution for various conversion needs in a user-friendly format.

## Features
- Broad Range of Units: Supports conversions between Metric tons, Kilograms, Grams, Milligrams, Micrograms, Stones, Pounds, and Ounces.
- High Precision: Accurate conversions even for very large (metric tons) or very small (micrograms) units.
- User-Friendly: Simple and straightforward interface for easy integration into any PHP project.
- Exception Handling: Robust error management for unsupported units.

## Installation

You can install the package via composer:

```bash
composer require karimtarekdev/weightify
```

## Supported Units
- Metric Tons (metric_ton)
- Kilograms (kg)
- Grams (gram)
- Milligrams (mg)
- Micrograms (microgram)
- Stones (stone)
- Pounds (pound)
- Ounces (ounce)

## Basic Conversion
To perform a conversion, use the convert method with the desired units. Here are some examples showcasing the use of different units:

```php
$converter = new KarimTarekDev\Weightify();

// Convert 2 Metric tons to Pounds
echo $converter->convert(2, 'metric_ton', 'pound') . " lbs\n";

// Convert 1500 Milligrams to Grams
echo $converter->convert(1500, 'mg', 'gram') . " grams\n";

// Convert 3 Stones to Kilograms
echo $converter->convert(3, 'stone', 'kg') . " kg\n";

// Convert 200 Ounces to Micrograms
echo $converter->convert(200, 'ounce', 'microgram') . " micrograms\n";
```
By providing the value, source unit, and target unit, you can perform a wide range of conversions with "Weightify."


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Karim Tarek](https://github.com/KarimTarekDev)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
