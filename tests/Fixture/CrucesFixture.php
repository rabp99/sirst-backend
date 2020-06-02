<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CrucesFixture
 */
class CrucesFixture extends TestFixture
{
    public $import = ['table' => 'cruces'];
    
    public $records = [
        [
            'punto_id' => 1,
            'regulador_id' => 7,
            'codigo' => '21',
            'descripcion' => 'Av. América Sur',
            'estado_id' => 1
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '24',
            'descripcion' => 'Av. América Norte',
            'estado_id' => 1
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 2,
            'codigo' => '52',
            'descripcion' => 'Av. España',
            'estado_id' => 1
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 3,
            'codigo' => '65',
            'descripcion' => 'Av. Larco',
            'estado_id' => 1
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 2,
            'codigo' => '51',
            'descripcion' => 'Ca. Pedro Muñiz',
            'estado_id' => 1
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 1,
            'codigo' => '45',
            'descripcion' => 'Av. Húsares de Junin',
            'estado_id' => 1
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 2,
            'codigo' => '78',
            'descripcion' => 'Av. Vera Enriquez',
            'estado_id' => 1
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 6,
            'codigo' => '14',
            'descripcion' => 'Ca. San Martín',
            'estado_id' => 1
        ]
    ];
}
