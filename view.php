<?php
    global $localesSupported, $locale, $currencyLocale, $dateLocale;
    global $books_bought;
    global $discount_cents;
    global $discount_from;
?>
<html lang="<?= str_replace('_', '-', $locale)  ?>">
<body>
<form method="get">
    <select name="locale">
        <option disabled>Select Language</option>
        <?php foreach ($localesSupported as $loc): ?>
            <option value="<?= $loc ?>">
                <?= Locale::getDisplayLanguage($loc, $loc) ?>
                (<?= Locale::getDisplayLanguage($loc, 'en_US') ?>)
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Submit</button>
</form>
<h1><?= t('welcome') ?></h1>
<ul>
    <!-- Rules: https://unicode-org.github.io/cldr-staging/charts/37/supplemental/language_plural_rules.html -->
    <li>zero: <?= t('confirm_books_bought', [0, 'books_bought' => 0]) ?></li>
    <li>one (singular): <?= t('confirm_books_bought', [1, 'books_bought' => 1]) ?></li>
    <li>two (dual): <?= t('confirm_books_bought', [2, 'books_bought' => 2]) ?></li>
    <li>few (paucal): <?= t('confirm_books_bought', [5, 'books_bought' => 5]) ?></li>
    <li>many: <?= t('confirm_books_bought', [11, 'books_bought' => 11]) ?></li>
    <li>other: <?= t('confirm_books_bought', [101, 'books_bought' => 101]) ?></li>
</ul>
<p>
    <?= t('discount_available', [
            'discount_amount' => $currencyLocale->format($discount_cents / 100),
            'discount_from' => $dateLocale->format($discount_from),
    ]) ?>
</p>
<p>
    <?= t('key_has_only_source') ?>
</p>
</body>
</html>
