# Aplikace pro muzea - MERLOT

## Jak zprovoznit projekt

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

## Jak zprovoznit databázi

1. Zajistěte databázi se spojením určeným v souboru `.env`.
2. Spusťte v terminálu (PHPStorm nebo cmd ve složce projektu) příkaz `php artisan migrate`.

### SQLite databáze

1. Soubor SQLite databáze umístěte do `database\database.sqlite` (může to být i nový prázdný soubor).
2. Pro připojení k databázi je v potřeba v souboru `.env` nastavit `DB_CONNECTION=sqlite` (ostatní nastavení pro databázi odstranit).
3. Pro **čistou** migraci spusťte příkaz `php artisan migrate:fresh`.

### Seeding

Pro vygenerování testovacích dat stačí spustit "seed".

```shell script
php artisan db:seed
```

Případně `php artisan migrate:refresh --seed`.

Migrace dat z Mockaroo je tímto okamžikem obsolete.

### Výchozí uživatel

Je nadefinován výchozí (testovací) uživatel.

**Login** admin@kaplicky.com **heslo** admin

## Jak zprovoznit bootstrap a kompilaci SASS souborů

1. Ujistěte se, že v sekci **Run/Edit Configurations** máte nastavený **Document root** na složku `public` v kořenovém adresáři (jinak aplikace **nenajde** vygenerované css soubory).
2. Spusťte `composer install` (soubor pro composer už by měl být updatován) pro nainstalování balíčku `laravel/ui`.
3. Spusťte v terminálu příkaz `npm install && npm run dev`, příkaz zkompiluje všechny dostupné sass (`resources/sass`) do css souboru typicky do složky `public/css`.
    1. Nastavením příkazu `npm run watch` se sass automaticky překompiluje při detekci změny.

## Nastavení Mailtrap účtu pro odesílání registračních zpráv

Pro správné nastavení posílání emailů je nutné poupravit soubor `.env`. Najděte v souboru sekci `MAIL_...` a nahraďte je níže uvedenými hodnotami:

```shell script
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=d1eae987fe913e
MAIL_PASSWORD=d109bc15f3dc66
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=merlot@merlot.org
MAIL_FROM_NAME="${APP_NAME}"
```

Pro přístup k mail serveru je nutné se příhlásit na stránce https://mailtrap.io/ s níže přidanými přihlašovacími údaji:

email:`jnohac@students.zcu.cz`
heslo:`merlot2020Betammajl`

Následně je konkrétní mail server přístupný z Inboxu `Demo inbox`.

