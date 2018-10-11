<?php

return [
    'store_id' => 'duits',
    'signature_key' => '4170582cc27b67e484153f90131bcf05',
    'sandbox' => true,
    'redirect_url' => [
        'success' => [
            'route' => 'payment.success' // payment.success
        ],
        'cancel' => [
            'route' => 'payment.cancel' // payment/cancel or you can use route also
        ]
    ]
];
