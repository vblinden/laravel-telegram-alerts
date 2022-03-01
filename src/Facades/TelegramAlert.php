<?php

namespace Vblinden\TelegramAlerts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static self to(string $id)
 * @method static void message(string $text)
 *
 * @see \Vblinden\TelegramAlerts\TelegramAlert
 */
class TelegramAlert extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-telegram-alerts';
    }
}
