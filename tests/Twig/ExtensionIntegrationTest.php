<?php

namespace Ivoba\Test\Money\Twig;

use Ivoba\Money\Formatter\MoneyFormatter;
use Ivoba\Money\Twig\MoneyExtension;

class ExtensionIntegrationTest extends \Twig_Test_IntegrationTestCase
{
    public function getExtensions()
    {
        return array(
            new MoneyExtension(new MoneyFormatter())
        );
    }

    public function getFixturesDir()
    {
        return dirname(__FILE__) . '/Fixtures/';
    }
}
