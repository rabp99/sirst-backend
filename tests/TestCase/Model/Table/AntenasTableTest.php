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
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Antenas') ? [] : ['className' => AntenasTable::class];
        $this->Antenas = TableRegistry::getTableLocator()->get('Antenas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Antenas);

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
