<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TSwitchesFixture
 */
class TSwitchesFixture extends TestFixture
{
    public $import = ['model' => 'Tswitches'];
    
    public $records = [
        [
            'modelo_id' => 1,
            'punto_id' => 1,
            'ip' => '192.168.10.15',
            'estado_id' => 1
        ],
        [
            'modelo_id' => 2,
            'punto_id' => 2,
            'ip' => '192.168.10.20',
            'estado_id' => 1
        ],
        [
            'modelo_id' => 1,
            'punto_id' => 2,
            'ip' => '192.168.10.30',
            'estado_id' => 1
        ],
        [
            'modelo_id' => 2,
            'punto_id' => 1,
            'ip' => '192.168.10.31',
            'estado_id' => 1
        ],
        [
            'modelo_id' => 1,
            'punto_id' => 1,
            'ip' => '192.168.10.24',
            'estado_id' => 1
        ],
        [
            'modelo_id' => 3,
            'punto_id' => 5,
            'ip' => '192.168.10.54',
            'estado_id' => 1
        ],
        [
            'modelo_id' => 1,
            'punto_id' => 4,
            'ip' => '192.168.10.68',
            'estado_id' => 1
        ],
        [
            'modelo_id' => 2,
            'punto_id' => 2,
            'ip' => '192.168.10.120',
            'estado_id' => 2
        ],
        [
            'modelo_id' => 3,
            'punto_id' => 4,
            'ip' => null,
            'estado_id' => 1
        ]
    ];
}
