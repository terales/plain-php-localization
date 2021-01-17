<?php

// Detect and load selected locale
$localesSupported = ['en_US', 'ar_EG', 'zh_CN', 'es_MX'];
$localeDefault = 'en_US';
$locale = empty($_GET['locale']) || !in_array($_GET['locale'], $localesSupported) ? $localeDefault : $_GET['locale'];
$currencyLocale = new \NumberFormatter($locale,  \NumberFormatter::CURRENCY);
$dateLocale = new \IntlDateFormatter($locale, \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);

// Support untranslated keys.
// If there would be any keys missing in default locale (en_US), then developer would see an Undefined index notice.
$messagesTranslated = include('locales/' . $locale . '.php');
$messagesDefault = include('locales/' . $localeDefault . '.php');

// Load amount of books bought
$books_bought = empty($_GET['books']) ? 0 : (int) $_GET['books'];
$discount_cents = 999;
$discount_from = new \DateTime('2021-01-16');

// Render HTML layout
require('view.php');

// Helper function for ease of use
function t($key, array $params = []) {
    global $locale;
    global $localeDefault;
    global $messagesTranslated;
    global $messagesDefault;

    if (empty($messagesTranslated[$key])) {
        $localeUsed = $localeDefault;
        $message = $messagesDefault[$key];
    } else {
        $localeUsed = $locale;
        $message = $messagesTranslated[$key];
    }

    return empty($params)
        ? $message
        : MessageFormatter::formatMessage($localeUsed, $message, $params);
}
