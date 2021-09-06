<?php

namespace tanyudii\LaravelException;

use tanyudii\LaravelException\Jobs\SendMessageJob;
use Throwable;
use WeStacks\TeleBot\Laravel\TeleBot;

class LaravelException
{
    /**
     * @param Throwable $e
     * @return string
     */
    public function buildNotificationMessage(Throwable $e): string
    {
        return vsprintf(trim("
                We got the exception from application %s.\nError Code: [%d] \nError Message: %s \nLocation: \n%s:%d
            "),
            [config('app.name'), $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine(), $e->getMessage()]
        );
    }

    /**
     * @param Throwable $e
     * @return void
     */
    public function sendNotificationMessage(Throwable $e): void
    {
        if (!in_array($e->getCode(), config('laravel-exception.catchable'))) {
            return;
        }

        $chatId = config('laravel-exception.chat_id');
        if (empty($chatId)) {
            return;
        }

        $params = [
            'chat_id' => $chatId,
            'text' => $this->buildNotificationMessage($e),
        ];

        if (config('laravel-exception.async_message')) {
            SendMessageJob::dispatch($params);
        } else {
            TeleBot::sendMessage($params);
        }
    }

}
