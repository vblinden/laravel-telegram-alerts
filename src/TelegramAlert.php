<?php

namespace Vblinden\TelegramAlerts;

use Illuminate\Support\Collection;

class TelegramAlert
{
    protected Collection $recipients;

    public function __construct()
    {
        $this->recipients = collect([config('telegram-alerts.default')]);
    }

    public function to(string $id): self
    {
        $this->recipients->push($id);

        return $this;
    }

    public function message(string $text): void
    {
        foreach ($this->recipients->filter() as $recipient) {
            $job = Config::getJob([
                'id' => $recipient,
                'text' => collect([config('telegram-alerts.prefix'), $text])->filter()->join(' - '),
            ]);

            dispatch($job);
        }
    }
}
