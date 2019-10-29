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
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Reguladores') ? [] : ['className' => ReguladoresTable::class];
        $this->Reguladores = TableRegistry::getTableLocator()->get('Reguladores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reguladores);

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
