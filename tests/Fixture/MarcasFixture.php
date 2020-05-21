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
            'descripcion' => 'Epson'
        ],
        [
            'descripcion' => 'Nuevo Epson'
        ],
        [
            'descripcion' => 'HP'
        ],
        [
            'descripcion' => 'Nuevo HAP'
        ],
        [
            'descripcion' => 'Dell'
        ]
    ];
}
