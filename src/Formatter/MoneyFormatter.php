<?php

namespace Ivoba\Money\Formatter;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use Symfony\Component\Intl\Intl;

class MoneyFormatter
{
    /**
     * @var
     */
    private $locale;

    /**
     * @param null|string $locale
     */
    public function __construct($locale = null)
    {
        $this->locale = $locale;
        if ($this->locale === null) {
            $this->locale = \Locale::getDefault();
        }
    }

    /**
     * localized format for money with the NumberFormatter class in Decimal mode
     * without currency symbol
     * like 1.234,56
     *
     * @param Money $money
     * @param null  $locale
     * @param int $minFractionDigits
     * @return bool|string
     */
    public function formatI18nDecimal(Money $money, $locale = null, $minFractionDigits = 0)
    {
        if ($locale === null) {
            $locale = $this->locale;
        }

        $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::DECIMAL);
        $numberFormatter->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS,$minFractionDigits);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, new ISOCurrencies());

        return $moneyFormatter->format($money);
    }

    /**
     * localized format for money with the NumberFormatter class in Currency mode
     * with currency symbol
     * like €1.234,56
     *
     * @param Money $money
     * @param null  $locale
     * @return bool|string
     */
    public function formatI18n(Money $money, $locale = null)
    {
        if ($locale === null) {
            $locale = $this->locale;
        }

        $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, new ISOCurrencies());

        return $moneyFormatter->format($money);
    }

    /**
     * gets currency symbol
     *
     * @param Money $money
     * @return null|string
     */
    public function formatCurrencyAsSymbol(Money $money)
    {
        return Intl::getCurrencyBundle()->getCurrencySymbol($money->getCurrency()->getCode());
    }

    /**
     * gets currency name
     *
     * @param Money $money
     * @return null|string
     */
    public function formatCurrencyAsName(Money $money)
    {
        return Intl::getCurrencyBundle()->getCurrencyName($money->getCurrency()->getCode());
    }
}
