# money-twig-extension

Twig Extension for [Money](https://github.com/moneyphp/money) value object

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require ivoba/money-twig-extension
```

## Usage
Register the Twig Extension according to the framework you are using.

Symfony Example:  

```xml
<service id="ivoba_money_twig_extension" class="Ivoba\Money\Twig\MoneyExtension">
  <tag name="twig.extension" />
</service>
```

In your templates use like so:  

```
 {{ money.convertedAmount }} 213.23
 {{ money|money_i18n_format('de_DE') }} 1.123,45 €
 {{ money|money_i18n_format('en_US') }} €1,123.45
 {{ money|money_i18n_decimal('en_US') }} 1,123.45
 {{ money|money_currency_symbol('en_US') }} €
 {{ money|money_currency_name('en_US') }} Euro
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Ivo Bathke][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ivoba/money-twig-extension.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ivoba/money-twig-extension/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ivoba/money-twig-extension.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ivoba/money-twig-extension.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ivoba/money-twig-extension.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ivoba/money-twig-extension
[link-travis]: https://travis-ci.org/ivoba/money-twig-extension
[link-scrutinizer]: https://scrutinizer-ci.com/g/ivoba/money-twig-extension/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ivoba/money-twig-extension
[link-downloads]: https://packagist.org/packages/ivoba/money-twig-extension
[link-author]: https://github.com/ivoba
[link-contributors]: ../../contributors
