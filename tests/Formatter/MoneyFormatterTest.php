<?php

namespace Ivoba\Money\Test\Formatter;

use Ivoba\Money\Formatter\MoneyFormatter;
use Money\Money;

class MoneyFormatterTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        $formatter = new MoneyFormatter('de_DE');
        $money = Money::EUR(12345);

        $this->assertEquals('123,45 €', $formatter->formatI18n($money));
    }

    public function testFormatI18n()
    {
        $formatter = new MoneyFormatter();
        $money = Money::EUR(12345);

        $this->assertEquals('€123.45', $formatter->formatI18n($money, 'en_US'));
    }

    public function testFormatI18nDecimal()
    {
        $formatter = new MoneyFormatter('de_DE');
        $money = Money::EUR(112345);

        $this->assertEquals('1,123.45', $formatter->formatI18nDecimal($money, 'en_US'));
    }

    public function testFormatCurrencyAsSymbol()
    {
        $formatter = new MoneyFormatter('de_DE');
        $money = Money::EUR(12345);

        $this->assertEquals('€', $formatter->formatCurrencyAsSymbol($money));
    }

    public function testFormatCurrencyAsName()
    {
        $formatter = new MoneyFormatter('de_DE');
        $money = Money::EUR(12345);

        $this->assertEquals('Euro', $formatter->formatCurrencyAsName($money));
    }
}
