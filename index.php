<?php

// Detect and load selected locale
$localesSupported = ['en_US', 'ar_EG', 'zh_CN', 'es_MX'];
$locale = empty($_GET['locale']) || !in_array($_GET['locale'], $localesSupported) ? $localeDefault : $_GET['locale'];
$currencyLocale = new \NumberFormatter($locale,  \NumberFormatter::CURRENCY);
$dateLocale = new \IntlDateFormatter($locale, \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
$t = include('locales/' . $locale . '.php');

// Load amount of books bought
$books_bought = empty($_GET['books']) ? 0 : (int) $_GET['books'];
$discount_cents = 999;
$discount_from = new \DateTime('2021-01-16');

// Render HTML layout
require('view.php');
