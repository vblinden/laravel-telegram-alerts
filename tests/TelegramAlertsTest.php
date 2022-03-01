<?php

use Illuminate\Support\Facades\Bus;
use Vblinden\TelegramAlerts\Exceptions\JobClassDoesNotExist;
use Vblinden\TelegramAlerts\Facades\TelegramAlert;
use Vblinden\TelegramAlerts\Jobs\SendToTelegramJob;

beforeEach(function () {
    Bus::fake();

    config()->set('telegram-alerts.token', 'test');
});

it('can dispatch a job to send a message to specific recipient', function () {
    TelegramAlert::to('fake')->message('wat');

    Bus::assertDispatched(SendToTelegramJob::class);
});

it('can dispatch a job to send a message to default recipient', function () {
    config()->set('telegram-alerts.default', 'test');

    TelegramAlert::message('wat');

    Bus::assertDispatched(SendToTelegramJob::class);
});

it('can dispatch multiple jobs to send a message to multiple recipients', function () {
    TelegramAlert::to('test1')->to('test2')->message('test');

    Bus::assertDispatched(SendToTelegramJob::class);
});

it('can dispatch a job to send a message with prefix text', function () {
    config()->set('telegram-alerts.prefix', 'My app');

    TelegramAlert::to('test')->message('test');

    Bus::assertDispatched(SendToTelegramJob::class, function (SendToTelegramJob $job) {
        return $job->text === 'My app - test';
    });
});

it('will throw an exception for a non existing job class', function () {
    config()->set('telegram-alerts.job', 'non-existing-job');

    TelegramAlert::to('test')->message('test-data');
})->throws(JobClassDoesNotExist::class);

it('will throw an exception for an invalid job class', function () {
    config()->set('telegram-alerts.job', '');

    TelegramAlert::to('test')->message('test-data');
})->throws(JobClassDoesNotExist::class);

it('will throw an exception for a missing job class', function () {
    config()->set('telegram-alerts.job', null);

    TelegramAlert::to('test')->message('test-data');
})->throws(JobClassDoesNotExist::class);
