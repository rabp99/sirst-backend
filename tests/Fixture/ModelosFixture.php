<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModelosFixture
 */
class ModelosFixture extends TestFixture
{
    public $import = ['table' => 'modelos'];
    
    public $records = [
        [
            'marca_id' => 1,
            'descripcion' => 'HP plus',
            'observacion' => 'Lorem ipsum dolor sit amet'
        ],
        [
            'marca_id' => 2,
            'descripcion' => 'HP media',
            'observacion' => 'Lorem ipsum dolor sit amet'
        ],
        [
            'marca_id' => 1,
            'descripcion' => 'HP vizen',
            'observacion' => 'Lorem ipsum dolor sit amet'
        ],
        [
            'marca_id' => 3,
            'descripcion' => 'super Dell mega',
            'observacion' => 'Lorem ipsum dolor sit amet'
        ],
        [
            'marca_id' => 1,
            'descripcion' => 'Dell ultra',
            'observacion' => 'Lorem ipsum dolor sit amet'
        ],
        [
            'marca_id' => 2,
            'descripcion' => 'Lenovo resize',
            'observacion' => 'Lorem ipsum dolor sit amet'
        ]
    ];
}
