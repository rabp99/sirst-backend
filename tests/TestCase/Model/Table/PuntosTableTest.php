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
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Puntos') ? [] : ['className' => PuntosTable::class];
        $this->Puntos = TableRegistry::getTableLocator()->get('Puntos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Puntos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
