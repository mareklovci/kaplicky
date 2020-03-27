# Aplikace pro muzea - MERLOT

###### Jak zprovoznit projekt:

1. Stáhněte **PHPStorm** (zdarma přes školní licenci), **PHP** (ideálně verze 7.4 a výš, minimálně verze 7.2.5) a **Composer**. Všechny tyto nainstalujte (PHP se neinstaluje).
2. Ve složce s PHP přejmenujte _php.ini-developement_ na _php.ini_ a v souboru odkomentujte všechny extension kromě _ffi_, _ftp_, _mbstring_, _exif_, _oci8_12c_, _openssl_, _pdo_firebird_, _pdo_oci_.
3. V PHPStormu aktivujte školní licenci a natahejte přes **Settings/Plugins** potřebné pluginy (např. **Laravel**).
4. V PHPStormu v **Settings/Languages & Frameworks/PHP** vyberte používanou verzi PHP. Pravděpodobně budete muset ručně vybrat celou cestu do složky v include path i k interpretu php.
5. V PHPStormu v **Settings/Languages & Frameworks/PHP/Composer** vyberte cestu ke composeru a příslušný PHP interpreter. Doporučuji cestu vybrat ručně k _composer.phar_.
6. Vytvořte libovolným způsobem místní repozitář a pullněte projekt (já používám _Sourcetree_).
7. Otevřete přes běžnou **cmd** složku projektu a spusťte následující sadu příkazů:
    1. `composer install` - bude se chvíli instalovat.
    2. `copy .env.example .env` (pro Linux: `cp .env.example .env`)
    3. `php artisan key:generate`
8. V PHPStorm v **Run/Edit Configurations** přidejte **PHP Build-in Web Server** , jeho _document root_ je složka projektu a _use router script_ ukazuje na **server.php** ve stejné složce.
9. Spusťte projekt projekt. Na localhost by vám měl vyjet nápis **Laravel** s funkčním menu.

###### Jak zprovoznit databázi:

1. Zajistěte databázi se spojením určeným v souboru `.env`.
2. Spusťte v terminálu (PHPStorm nebo cmd ve složce projektu) příkaz `php artisan migrate`.

###### SQLite databáze

1. Soubor SQLite datábaze umístěte do `database\database.sqlite` (může to být i nový prázdný soubor).
2. Pro připojení k databázi je v potřeba v souboru `.env` nastavit `DB_CONNECTION=sqlite` (ostatní nastavení pro databázi odstranit).
3. Pro **čistou** migraci spusťte příkaz `php artisan migrate:fresh`.
