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
            'descripcion' => 'Av. América Sur'
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '24',
            'descripcion' => 'Av. América Norte'
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 2,
            'codigo' => '52',
            'descripcion' => 'Av. España'
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 3,
            'codigo' => '65',
            'descripcion' => 'Av. Larco'
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 2,
            'codigo' => '51',
            'descripcion' => 'Ca. Pedro Muñiz'
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 1,
            'codigo' => '45',
            'descripcion' => 'Av. Húsares de Junin'
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 2,
            'codigo' => '78',
            'descripcion' => 'Av. Vera Enriquez'
        ],
        [
            'punto_id' => 1,
            'regulador_id' => 6,
            'codigo' => '14',
            'descripcion' => 'Ca. San Martín'
        ]
    ];
}
