<?php

return [
    //The Chat ID of Telegram Group for send notification exception
    'chat_id' => env('LARAVEL_EXCEPTION_CHAT_ID', null),

    //The configuration for send message asynchronous or synchronous
    'async_message' => (bool) env('LARAVEL_EXCEPTION_ASYNC', false),

    //Catchable error code
    'catchable' => [
        //Internal Server Error
        500,
    ],
];
