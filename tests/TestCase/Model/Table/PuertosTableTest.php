<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PuertosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PuertosTable Test Case
 */
class PuertosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PuertosTable
     */
    public $Puertos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Puertos',
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
        $config = TableRegistry::getTableLocator()->exists('Puertos') ? [] : ['className' => PuertosTable::class];
        $this->Puertos = TableRegistry::getTableLocator()->get('Puertos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Puertos);

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
