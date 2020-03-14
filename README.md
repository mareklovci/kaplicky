# Aplikace pro muzea - MERLOT

Jak zprovoznit projekt:

1. Stáhněte PHPStorm (zdarma přes školní licenci), PHP (ideálně verze 7.4 a výš, minimálně verze 5.6) a Composer. Všechny tyto nainstalujte.
2. Ve složce s PHP přejmenujte php.ini-developement na php.ini a v souboru odkomentujte všechny extension odkomentujte kromě ffi, ftp, mbstring, exif, oci8_12c, openssl, pdo_firebird, pdo_oci.
3. V PHPStormu aktivujte školní licenci a natahejte přes Settings/Plugins potřebné pluginy (např. Laravel).
4. V PHPStormu v Settings/Languages & Frameworks/PHP vyberte PHP. Pravděpodobně budete muset ručně vybrat celou cestu do složky v include path i k interpretru php.
5. V PHPStormu v Settings/Languages & Frameworks/PHP/Composer vyberte cestu ke composeru a příslušný PHP interpreter. Doporučuji cestu vybrat ručně k composer.phar.
6. Vytvořte libovolným způsobem místní repozitář a pullněte projekt (já používám Sourcetree).
7. Otevřete přes běžnou cmd složku projektu a spusťte následující sadu příkazů:
	a. "composer install" - bude se chvíli instalovat.
	b. "copy .env.example .env" (pro Linux: "cp .env.example .env")
	c. "php artisan key:generate"
8. Spusťte projekt projekt. Na localhost by vám měl vyjet nápis Laravel s funkčním menu.