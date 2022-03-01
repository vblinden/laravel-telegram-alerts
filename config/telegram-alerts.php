<?php

return [
    // Your Telegram bot token...
    'token' => env('TELEGRAM_ALERTS_TOKEN'),

    // The default user or channel you want to send every message to...
    'default' => '',

    // This text will be prefixed to every message send to Telegram...
    'prefix' => '',

    // This job will send the message to Telegram...
    'job' => Vblinden\TelegramAlerts\Jobs\SendToTelegramJob::class,
];
