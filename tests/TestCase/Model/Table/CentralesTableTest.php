<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentralesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentralesTable Test Case
 */
class CentralesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CentralesTable
     */
    public $Centrales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Centrales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Centrales') ? [] : ['className' => CentralesTable::class];
        $this->Centrales = TableRegistry::getTableLocator()->get('Centrales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Centrales);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules() {
        // En caso se repita la descripción
        $centralTest1 = $this->Centrales->newEntity([
            'descripcion' => 'Central 1 CCHH',
            'nro' => 6
        ]);
        $expectedTest1 = [
            'descripcion' => [
                '_isUnique' => 'Ya existe una central con la misma descripción'
            ]
        ];
        $this->Centrales->save($centralTest1);
        $this->assertSame($expectedTest1, $centralTest1->getErrors());
        
        // En caso se repita el nro
        $centralTest2 = $this->Centrales->newEntity([
            'descripcion' => 'Central 10 Algo',
            'nro' => 3
        ]);
        $expectedTest2 = [
            'nro' => [
                '_isUnique' => 'Ya existe una central con el mismo número'
            ]
        ];
        $this->Centrales->save($centralTest2);
        $this->assertSame($expectedTest2, $centralTest2->getErrors());
    }
}
