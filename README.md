# Faker PHP — nl_NL locale

Dutch (Netherlands) (`nl_NL`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-nl-nl
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('nl_NL');

$faker->name();        // "Sanne de Vries"
$faker->fullAddress(); // "Kerkstraat 12, 1234 AB Utrecht"
$faker->bsn();         // "111222333"
```

Generators without a `nl_NL` variant fall back to the default locale.

## Locale-specific generators

| Method | Extension | Description |
| --- | --- | --- |
| `province()` / `provinceCode()` | Address | The 12 provinces and their codes (`NH`, `ZH`, ...) |
| `postcode()` | Address | `1234 AB` postcode, skipping the letter pairs that are not issued |
| `bsn()` | Person | Burgerservicenummer passing the 11-proef |
| `companyNumber()` | Company | 8 digits KvK number |
| `rsin()` | Company | RSIN passing the 11-proef |
| `vat()` | Company | `NL` + RSIN + `B01` btw-identificatienummer |
| `iban()` | Financial | `NL` IBAN with a real bank code |

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerNlNlServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
