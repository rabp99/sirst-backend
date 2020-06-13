<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrucesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrucesTable Test Case
 */
class CrucesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CrucesTable
     */
    public $Cruces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.Cruces',
        'app.Puntos',
        'app.Reguladores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cruces') ? [] : ['className' => CrucesTable::class];
        $this->Cruces = TableRegistry::getTableLocator()->get('Cruces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Cruces);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules() {
        // En caso se repita el código
        $cruceTest1 = $this->Cruces->newEntity([
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '45',
            'descripcion' => 'Av. De nada',
            'estado_id' => 1
        ]);
        $expectedTest1 = [
            'codigo' => [
                'codigoUnique' => 'Ya existe un cruce activo con el mismo código'
            ]
        ];
        $this->Cruces->save($cruceTest1);
        $this->assertSame($expectedTest1, $cruceTest1->getErrors());
        
        // En caso se repita la descripción
        $cruceTest2 = $this->Cruces->newEntity([
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '413',
            'descripcion' => 'Av. Vera Enriquez',
            'estado_id' => 1
        ]);
        $expectedTest2 = [
            'descripcion' => [
                'descripcionUnique' => 'Ya existe un cruce activo con la misma descripción'
            ]
        ];
        $this->Cruces->save($cruceTest2);
        $this->assertSame($expectedTest2, $cruceTest2->getErrors());
    }
}
