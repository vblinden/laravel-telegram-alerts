# Quickly send a message to Telegram

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vblinden/laravel-telegram-alerts.svg?style=flat-square)](https://packagist.org/packages/vblinden/laravel-telegram-alerts)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/vblinden/laravel-telegram-alerts/run-tests?label=tests)](https://github.com/vblinden/laravel-telegram-alerts/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/vblinden/laravel-telegram-alerts/Check%20&%20fix%20styling?label=code%20style)](https://github.com/vblinden/laravel-telegram-alerts/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/vblinden/laravel-telegram-alerts.svg?style=flat-square)](https://packagist.org/packages/vblinden/laravel-telegram-alerts)

This package can quickly send alerts to Telegram. You can use this to notify yourself of any noteworthy events happening
in your app.

```php
use Vblinden\TelegramAlerts\Facades\TelegramAlert

TelegramAlert::message("You have a new subscriber to the {$newsletter->name} newsletter!")
```

Under the hood, a job is used to communicate with Telegram. This prevents your app from failing in case Telegram is
down.

## Installation

You can install the package via composer:

```bash
composer require vblinden/laravel-telegram-alerts
```

You can publish
the [config file](https://github.com/vblinden/laravel-telegram-alerts/blob/main/config/telegram-alerts.php) with:

```bash
php artisan vendor:publish --tag="laravel-telegram-alerts-config"
```

## Usage

To send a message to Telegram, simply call `TelegramAlert::message()` and pass it any message you want.

```php
TelegramAlert::message('Hello from your app!');
```

To send a message to multiple recipients.

```php
TelegramAlert::to('channel-id')->to('user-id')->message('Hello from your app!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [vblinden](https://github.com/vblinden)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
