<?php

namespace Ivoba\Test\Money\Formatter\MoneyFormatter;

use Ivoba\Money\Formatter\MoneyFormatter;
use SebastianBergmann\Money\Money;

class MoneyFormatterTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        $formatter = new MoneyFormatter('de_DE');
        $money = Money::fromString('123.45', 'EUR');

        $this->assertEquals('123,45 €', $formatter->formatI18n($money));
    }

    public function testFormatI18n()
    {
        $formatter = new MoneyFormatter();
        $money = Money::fromString('123.45', 'EUR');

        $this->assertEquals('€123.45', $formatter->formatI18n($money, 'en_US'));
    }

    public function testFormatI18nDecimal()
    {
        $formatter = new MoneyFormatter('de_DE');
        $money = Money::fromString('1123.45', 'EUR');

        $this->assertEquals('1,123.45', $formatter->formatI18nDecimal($money, 'en_US'));
    }

    public function testFormatCurrencyAsSymbol()
    {
        $formatter = new MoneyFormatter('de_DE');
        $money = Money::fromString('123.45', 'EUR');

        $this->assertEquals('€', $formatter->formatCurrencyAsSymbol($money, 'en_US'));
    }

    public function testFormatCurrencyAsName()
    {
        $formatter = new MoneyFormatter('de_DE');
        $money = Money::fromString('123.45', 'EUR');

        $this->assertEquals('Euro', $formatter->formatCurrencyAsName($money));
    }
}
