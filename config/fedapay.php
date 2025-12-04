<?php

return [
    'mode' => env('FEDAPAY_MODE', 'sandbox'),
    'api_key' => env('FEDAPAY_API_KEY'),
    'token' => env('FEDAPAY_TOKEN'),
    'success_url' => env('FEDAPAY_SUCCESS_URL', '/payment/success'),
    'cancel_url' => env('FEDAPAY_CANCEL_URL', '/payment/cancel'),
    'webhook_url' => env('FEDAPAY_WEBHOOK_URL', '/webhook/fedapay'),
];
