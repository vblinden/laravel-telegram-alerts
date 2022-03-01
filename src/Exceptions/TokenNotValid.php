<?php

namespace Vblinden\TelegramAlerts\Exceptions;

use RuntimeException;

class TokenNotValid extends RuntimeException
{
    public static function make(): self
    {
        return new self('Make sure you specify a valid bot token in the `token` key of the telegram-alerts.php config file.');
    }
}
