<?php
    global $localesSupported, $locale, $t, $currencyLocale, $dateLocale;
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
<p><?= t('confirm_books_bought', ['books_bought' => $books_bought]) ?></p>
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
