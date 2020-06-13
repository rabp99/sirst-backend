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
        'app.Estados',
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
        // En caso se repita el device name
        $antenaTest1 = $this->Antenas->newEntity([
            'punto_id' => 1,
            'enlace_id' => 1,
            'modelo_id' => 3,
            'puerto_id' => 1,
            'ip' => '192.168.20.15',
            'device_name' => 'CRUCE_15_30_AP',
            'mode' => 'AP',
            'estado_id' => 1
        ]);
        $expectedTest1 = [
            'device_name' => [
                'deviceNameUnique' => 'Ya existe una antena activa con el mismo device name'
            ]
        ];
        $this->Antenas->save($antenaTest1);
        $this->assertSame($expectedTest1, $antenaTest1->getErrors());
    }
    
    /**
     * Test ifIpExists method
     *
     * @return void
     */
    public function testIfIpExists() {
        $antenaTest1 = $this->Antenas->newEntity([
            'punto_id' => 1,
            'enlace_id' => 1,
            'modelo_id' => 3,
            'puerto_id' => 1,
            'ip' => '192.168.20.45',
            'device_name' => 'CRUCE_AX',
            'mode' => 'AP',
            'estado_id' => 1
        ]);
        $this->Antenas->save($antenaTest1);
        $this->assertEquals("Existen 2 antenas activas con la misma ip", $this->Antenas->ifIpExists($antenaTest1));
    }
}