<?php

namespace Vblinden\TelegramAlerts\Exceptions;

use RuntimeException;

class JobClassDoesNotExist extends RuntimeException
{
    public static function make(?string $name): self
    {
        return new self(sprintf('The configured job class `%s` does not exist. Make sure you specific a valid class name in the `job` key of the telegram-alerts config file.', $name));
    }
}
