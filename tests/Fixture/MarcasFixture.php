<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MarcasFixture
 */
class MarcasFixture extends TestFixture
{
    public $import = ['table' => 'marcas'];
    
    public $records = [
        [
            'descripcion' => 'Epson',
            'estado_id' => 1
        ],
        [
            'descripcion' => 'Nuevo Epson',
            'estado_id' => 1
        ],
        [
            'descripcion' => 'HP',
            'estado_id' => 1
        ],
        [
            'descripcion' => 'Nuevo HAP',
            'estado_id' => 1
        ],
        [
            'descripcion' => 'Dell',
            'estado_id' => 1
        ],
        [
            'descripcion' => 'Apple',
            'estado_id' => 2
        ]
    ];
}
