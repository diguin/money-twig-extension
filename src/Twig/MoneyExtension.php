<?php

namespace Ivoba\Money\Twig;

use Ivoba\Money\Formatter\MoneyFormatter;

class MoneyExtension extends \Twig_Extension
{

    private $moneyFormatter;

    /**
     * @param MoneyFormatter $moneyFormatter
     */
    public function __construct(MoneyFormatter $moneyFormatter)
    {
        $this->moneyFormatter = $moneyFormatter;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('money_i18n_format', [$this->moneyFormatter, 'formatI18n']),
            new \Twig_SimpleFilter('money_i18n_decimal', [$this->moneyFormatter, 'formatI18NDecimal']),
            new \Twig_SimpleFilter('money_currency_symbol', [$this->moneyFormatter, 'formatCurrencyAsSymbol']),
            new \Twig_SimpleFilter('money_currency_name', [$this->moneyFormatter, 'formatCurrencyAsName']),
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ivoba_sebastian_money_extension';
    }

}
