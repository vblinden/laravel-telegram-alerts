<?php

namespace Vblinden\TelegramAlerts\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Vblinden\TelegramAlerts\Config;

class SendToTelegramJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     */
    public int $maxExceptions = 3;

    public function __construct(public string $text, public string $id)
    {
        //
    }

    public function handle(): void
    {
        Http::get(sprintf('https://api.telegram.org/bot%s/sendMessage?chat_id=%s&text=%s', Config::getToken(), $this->id, $this->text));
    }
}
