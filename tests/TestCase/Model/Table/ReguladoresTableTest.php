<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReguladoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReguladoresTable Test Case
 */
class ReguladoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReguladoresTable
     */
    public $Reguladores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Reguladores',
        'app.Modelos',
        'app.Centrales',
        'app.Puntos',
        'app.Puertos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Reguladores') ? [] : ['className' => ReguladoresTable::class];
        $this->Reguladores = TableRegistry::getTableLocator()->get('Reguladores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Reguladores);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules() {
        // En caso se repita el código
        $reguladorTest1 = $this->Reguladores->newEntity([
            'modelo_id' => 3,
            'central_id' => 1,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '20',
            'ip' => '192.168.90.32'
        ]);
        $expectedTest1 = [
            'codigo' => [
                '_isUnique' => 'Ya existe un regulador con el mismo código'
            ]
        ];
        $this->Reguladores->save($reguladorTest1);
        $this->assertSame($expectedTest1, $reguladorTest1->getErrors());
        
        // En caso se repita el ip
        $reguladorTest2 = $this->Reguladores->newEntity([
            'modelo_id' => 3,
            'central_id' => 1,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '67',
            'ip' => '192.168.20.21'
        ]);
        $expectedTest2 = [
            'ip' => [
                '_isUnique' => 'Ya existe un regulador con la misma ip'
            ]
        ];
        $this->Reguladores->save($reguladorTest2);
        $this->assertSame($expectedTest2, $reguladorTest2->getErrors());
    }
}
