<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PuntosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PuntosTable Test Case
 */
class PuntosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PuntosTable
     */
    public $Puntos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.Puntos',
        'app.Antenas',
        'app.Cruces',
        'app.Reguladores',
        'app.TSwitches'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Puntos') ? [] : ['className' => PuntosTable::class];
        $this->Puntos = TableRegistry::getTableLocator()->get('Puntos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Puntos);

        parent::tearDown();
    }

    /**1
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules() {
        // en caso el código este repetido
        $puntoTest1 = $this->Puntos->newEntity([
            'codigo' => '10',
            'descripcion' => 'dsadsa',
            'latitud' => '-78.84712100',
            'longitud' => '153.61575600',
            'estado_id' => 1
        ]);
        $expectedTest1 = [
            'codigo' => [
                'codigoUnique' => 'Ya existe un punto activo con el mismo código'
            ]
        ];
        $this->Puntos->save($puntoTest1);
        $this->assertSame($expectedTest1, $puntoTest1->getErrors());
        
        // en caso la descripción este repetida
        $puntoTest2 = $this->Puntos->newEntity([
            'codigo' => '50',
            'descripcion' => 'Av. América Sur UPAO',
            'latitud' => '-78.84712100',
            'longitud' => '153.61575600',
            'estado_id' => 1
        ]);
        $expectedTest2 = [
            'descripcion' => [
                'descripcionUnique' => 'Ya existe un punto activo con la misma descripción'
            ]
        ];
        $this->Puntos->save($puntoTest2);
        $this->assertSame($expectedTest2, $puntoTest2->getErrors());
    }
}
