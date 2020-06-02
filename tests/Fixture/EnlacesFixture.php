<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnlacesFixture
 */
class EnlacesFixture extends TestFixture
{
    public $import = ['table' => 'enlaces'];
    
    public $records = [
        [
            'ssid' => 'TM_10_20',
            'channel_width' => '20MHZ',
            'estado_id' => 1
        ],
        [
            'ssid' => 'TM_15_24',
            'channel_width' => '40MHZ',
            'estado_id' => 1
        ],
        [
            'ssid' => 'TM_11_23',
            'channel_width' => '40MHZ',
            'estado_id' => 1
        ],
        [
            'ssid' => 'TM_11_24',
            'channel_width' => '40MHZ',
            'estado_id' => 1
        ],
        [
            'ssid' => 'TM_12_15',
            'channel_width' => '20MHZ',
            'estado_id' => 1
        ],
        [
            'ssid' => 'TM_12_11',
            'channel_width' => '20MHZ',
            'estado_id' => 1
        ],
        [
            'ssid' => 'TM_14_94',
            'channel_width' => '20MHZ',
            'estado_id' => 2
        ]
    ];
}
