<?php

/**
 * BG : blue, indigo, purple, pink, red, orange, yellow, green, teal, cyan, gray, gray-dark, black
 * Type : dark, light
 * Shadow : 0-4.
 */
return [
    'navbar'  => [
        'bg'     => 'warning',
        'type'   => 'light',
        'border' => true,
        'user'   => [
            'visible' => true,
            'shadow'  => false,
        ],
    ],
    'sidebar' => [
        'type'    => 'light',
        'shadow'  => false,
        'border'  => false,
        'compact' => false,
        'links'   => [
            'bg'     => 'orange',
            'shadow' => 1,
        ],
        'brand'   => [
            'bg'   => 'orange',
            'logo' => [
                'bg'     => 'white',
                'icon'   => '<i class="fa fa-cubes"></i>',
                'text'   => '<strong>SIPKawan</strong>',
                'shadow' => false,
            ],
        ],
        'user'    => [
            'visible' => true,
            'shadow'  => false,
        ],
    ],
    'footer'  => [
        'visible'    => true,
        'vendorname' => 'DPRKP',
        'vendorlink' => '',
    ],
    'card'    => [
        'outline'       => false,
        'default_color' => 'info',
    ],
];
