<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TSwitchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TSwitchesTable Test Case
 */
class TSwitchesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TSwitchesTable
     */
    public $TSwitches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TSwitches',
        'app.Modelos',
        'app.Puntos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TSwitches') ? [] : ['className' => TSwitchesTable::class];
        $this->TSwitches = TableRegistry::getTableLocator()->get('TSwitches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TSwitches);

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
