<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AntenasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AntenasTable Test Case
 */
class AntenasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AntenasTable
     */
    public $Antenas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Antenas',
        'app.Puntos',
        'app.Enlaces',
        'app.Modelos',
        'app.Puertos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Antenas') ? [] : ['className' => AntenasTable::class];
        $this->Antenas = TableRegistry::getTableLocator()->get('Antenas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Antenas);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules() {
        // En caso se repita la ip
        $antenaTest1 = $this->Antenas->newEntity([
            'punto_id' => 2,
            'enlace_id' => 1,
            'modelo_id' => 3,
            'puerto_id' => 1,
            'ip' => '192.168.20.45',
            'device_name' => 'CRUCE_387_24_ST',
            'mode' => 'ST'
        ]);
        $expectedTest1 = [
            'ip' => [
                '_isUnique' => 'Ya existe una antena con la misma ip'
            ]
        ];
        $this->Antenas->save($antenaTest1);
        $this->assertSame($expectedTest1, $antenaTest1->getErrors());
        
        // En caso se repita el device name
        $antenaTest2 = $this->Antenas->newEntity([
            'punto_id' => 1,
            'enlace_id' => 1,
            'modelo_id' => 3,
            'puerto_id' => 1,
            'ip' => '192.168.20.15',
            'device_name' => 'CRUCE_15_30_AP',
            'mode' => 'AP'
        ]);
        $expectedTest2 = [
            'device_name' => [
                '_isUnique' => 'Ya existe una antena con el mismo device name'
            ]
        ];
        $this->Antenas->save($antenaTest2);
        $this->assertSame($expectedTest2, $antenaTest2->getErrors());
    }
}