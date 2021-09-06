<?php

namespace tanyudii\LaravelException\Facades;

use Illuminate\Support\Facades\Facade;
use Throwable;

/**
 * @method static string buildNotificationMessage(Throwable $e)
 * @method static void sendNotificationMessage(Throwable $e)
 *
 * @see \tanyudii\LaravelException\LaravelException
 */
class LaravelException extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-exception';
    }
}
