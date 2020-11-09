<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAGEtTeYc:APA91bH8HohNX_fyaL8u8lKPQY4da_HUt6g3dPktFeRoVzYXNP2G_SAhQcMKsiSivJUPjbPrlzSZwwBW-irenYt7JVNPQYJBZFP4Mqg5GiB9J5_UKyGUWyI1xsEYBb_bm4jaLvzKQC7k'),
        'sender_id' => env('FCM_SENDER_ID', '104342976903'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
