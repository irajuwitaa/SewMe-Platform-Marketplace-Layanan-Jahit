<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID', 'G442538648'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-eDZdLgJ2E32nWfZ9'),
    'server_key' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-LSOYal9iv4GomOypnlJ_xU8S'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'snap_url' => env('MIDTRANS_SNAP_URL', 'https://app.sandbox.midtrans.com/snap/snap.js'),
];
