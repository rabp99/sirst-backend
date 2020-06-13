<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelosTable Test Case
 */
class ModelosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelosTable
     */
    public $Modelos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.Modelos',
        'app.Marcas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Modelos') ? [] : ['className' => ModelosTable::class];
        $this->Modelos = TableRegistry::getTableLocator()->get('Modelos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Modelos);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules() {
        // En caso se repita la descripción
        $modelo = $this->Modelos->newEntity([
            'marca_id' => 2,
            'descripcion' => 'HP vizen',
            'observacion' => 'dadadd dasd',
            'estado_id' => 1
        ]);
        $expected = [
            'descripcion' => [
                'descripcionUnique' => 'Ya existe un modelo activo con la misma descripción'
            ]
        ];
        $this->Modelos->save($modelo);
        $this->assertSame($expected, $modelo->getErrors());
    }
}
