<?php


return [
    'max_bill_count' => env('BILL_MAX_BILL_COUNT', 30),

    'user_max_count' => [
        'bills'    => env('BILL_MAX_COUNT_BILLS', 30),
        'events'   => env('BILL_MAX_COUNT_EVENTS', 1),
        'contacts' => env('BILL_MAX_COUNT_CONTACTS', 30),
    ],


];