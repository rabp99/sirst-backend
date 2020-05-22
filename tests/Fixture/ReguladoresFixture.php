<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReguladoresFixture
 */
class ReguladoresFixture extends TestFixture
{
    public $import = ['table' => 'reguladores'];
    
    public $records = [
        [
            'modelo_id' => 1,
            'central_id' => 2,
            'punto_id' => 1,
            'puerto_id' => 1,
            'codigo' => '20',
            'ip' => '192.168.10.25'
        ],
        [
            'modelo_id' => 2,
            'central_id' => 3,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '65',
            'ip' => '192.168.20.21'
        ],
        [
            'modelo_id' => 1,
            'central_id' => 4,
            'punto_id' => 1,
            'puerto_id' => 1,
            'codigo' => '62',
            'ip' => '192.168.10.65'
        ],
        [
            'modelo_id' => 6,
            'central_id' => 1,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '12',
            'ip' => '192.168.10.53'
        ],
        [
            'modelo_id' => 4,
            'central_id' => 2,
            'punto_id' => 4,
            'puerto_id' => 1,
            'codigo' => '5',
            'ip' => '192.168.20.67'
        ],
        [
            'modelo_id' => 4,
            'central_id' => 1,
            'punto_id' => 1,
            'puerto_id' => 1,
            'codigo' => '10',
            'ip' => '192.168.10.78'
        ],
        [
            'modelo_id' => 5,
            'central_id' => 2,
            'punto_id' => 4,
            'puerto_id' => 1,
            'codigo' => '57',
            'ip' => '192.168.20.65'
        ],
    ];
}
