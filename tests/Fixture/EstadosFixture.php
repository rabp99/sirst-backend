<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstadosFixture
 */
class EstadosFixture extends TestFixture
{
    public $import = ['table' => 'estados'];
    
    public $records = [
        [
            'descripcion' => 'Activo',
            'estado_id' => 1
        ],
        [
            'descripcion' => 'Deshabilitado',
            'estado_id' => 1
        ]
    ];
}
