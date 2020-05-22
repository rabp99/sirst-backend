<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AntenasFixture
 */
class AntenasFixture extends TestFixture
{
    public $import = ['table' => 'antenas'];
    
    public $records = [
        [
            'punto_id' => 1,
            'enlace_id' => 5,
            'modelo_id' => 6,
            'puerto_id' => 1,
            'ip' => '192.168.20.45',
            'device_name' => 'CRUCE_15_56_ST',
            'mode' => 'ST'
        ],
        [
            'punto_id' => 2,
            'enlace_id' => 2,
            'modelo_id' => 2,
            'puerto_id' => 1,
            'ip' => '192.168.20.67',
            'device_name' => 'CRUCE_15_30_AP',
            'mode' => 'ST'
        ],
        [
            'punto_id' => 3,
            'enlace_id' => 2,
            'modelo_id' => 2,
            'puerto_id' => 1,
            'ip' => '192.168.30.48',
            'device_name' => 'CRUCE_45_15_ST',
            'mode' => 'ST'
        ],
        [
            'punto_id' => 2,
            'enlace_id' => 3,
            'modelo_id' => 1,
            'puerto_id' => 1,
            'ip' => '192.168.60.24',
            'device_name' => 'CRUCE_58_15_ST',
            'mode' => 'AP'
        ],
        [
            'punto_id' => 3,
            'enlace_id' => 6,
            'modelo_id' => 3,
            'puerto_id' => 1,
            'ip' => '192.168.90.24',
            'device_name' => 'CRUCE_5_15_ST',
            'mode' => 'ST'
        ],
        [
            'punto_id' => 2,
            'enlace_id' => 4,
            'modelo_id' => 1,
            'puerto_id' => 1,
            'ip' => '192.168.20.32',
            'device_name' => 'CRUCE_35_18_AP',
            'mode' => 'AP'
        ],
        [
            'punto_id' => 1,
            'enlace_id' => 1,
            'modelo_id' => 4,
            'puerto_id' => 1,
            'ip' => '192.168.20.41',
            'device_name' => 'CRUCE_10_41_ST',
            'mode' => 'AP'
        ]
    ];
}
