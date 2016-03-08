<?php

namespace Ivoba\Money\Formatter;

use SebastianBergmann\Money\Money;
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
        if (is_null($this->locale)) {
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
     * @return bool|string
     */
    public function formatI18nDecimal(Money $money, $locale = null)
    {
        if ($locale === null) {
            $locale = $this->locale;
        }
        $formatter = new \NumberFormatter(
            $locale,
            \NumberFormatter::DECIMAL
        );

        return $formatter->format($money->getConvertedAmount());
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

        $formatter = new \NumberFormatter(
            $locale,
            \NumberFormatter::CURRENCY
        );

        return $formatter->formatCurrency(
            $money->getConvertedAmount(),
            $money->getCurrency()->getCurrencyCode()
        );
    }

    /**
     * gets currency symbol
     *
     * @param Money $money
     * @return null|string
     */
    public function formatCurrencyAsSymbol(Money $money)
    {
        return Intl::getCurrencyBundle()->getCurrencySymbol($money->getCurrency()->getCurrencyCode());
    }

    /**
     * gets currency name
     *
     * @param Money $money
     * @return null|string
     */
    public function formatCurrencyAsName(Money $money)
    {
        return Intl::getCurrencyBundle()->getCurrencyName($money->getCurrency()->getCurrencyCode());
    }
}
