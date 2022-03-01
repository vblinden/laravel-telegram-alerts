<?php

namespace Vblinden\TelegramAlerts;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TelegramAlertsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-telegram-alerts')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        $this->app->bind('laravel-telegram-alerts', function () {
            return new TelegramAlert();
        });
    }
}
