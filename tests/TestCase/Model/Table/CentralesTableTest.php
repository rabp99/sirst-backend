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
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Centrales') ? [] : ['className' => CentralesTable::class];
        $this->Centrales = TableRegistry::getTableLocator()->get('Centrales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Centrales);

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
}
