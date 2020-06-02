<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PuntosFixture
 */
class PuntosFixture extends TestFixture
{
    public $import = ['table' => 'puntos'];
    
    public $records = [
        [
            'codigo' => '10',
            'descripcion' => 'Av. América Sur UPAO',
            'latitud' => '-78.84727100',
            'longitud' => '153.61805600',
            'estado_id' => 1
        ],
        [
            'codigo' => '24',
            'descripcion' => 'Av. Húsares de Junín',
            'latitud' => '-78.84747800',
            'longitud' => '153.61832600',
            'estado_id' => 1
        ],
        [
            'codigo' => '34',
            'descripcion' => 'Av. América Norte',
            'latitud' => '-78.84723100',
            'longitud' => '153.61818600',
            'estado_id' => 1
        ],
        [
            'codigo' => '48',
            'descripcion' => 'Av. Víctor Larco',
            'latitud' => '-78.84723400',
            'longitud' => '153.61821600',
            'estado_id' => 1
        ],
        [
            'codigo' => '52',
            'descripcion' => 'Av. España',
            'latitud' => '-78.84723000',
            'longitud' => '153.61835600',
            'estado_id' => 1
        ]
    ];
}
