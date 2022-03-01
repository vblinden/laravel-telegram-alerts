<?php

namespace Vblinden\TelegramAlerts;

use Vblinden\TelegramAlerts\Exceptions\JobClassDoesNotExist;
use Vblinden\TelegramAlerts\Exceptions\TokenNotValid;
use Vblinden\TelegramAlerts\Jobs\SendToTelegramJob;

class Config
{
    public static function getJob(array $arguments): SendToTelegramJob
    {
        $jobClass = config('telegram-alerts.job');

        if (is_null($jobClass) || !class_exists($jobClass)) {
            throw JobClassDoesNotExist::make($jobClass);
        }

        return app($jobClass, $arguments);
    }

    public static function getToken(): string
    {
        $token = config('telegram-alerts.token');

        if (!$token) {
            throw TokenNotValid::make();
        }

        return $token;
    }
}
