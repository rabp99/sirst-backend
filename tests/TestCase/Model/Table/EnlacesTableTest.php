<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnlacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnlacesTable Test Case
 */
class EnlacesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnlacesTable
     */
    public $Enlaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Enlaces',
        'app.Antenas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Enlaces') ? [] : ['className' => EnlacesTable::class];
        $this->Enlaces = TableRegistry::getTableLocator()->get('Enlaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Enlaces);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules() {
        $enlace = $this->Enlaces->newEntity([
            'ssid' => 'TM_10_20',
            'channel_width' => '20MHZ'
        ]);
        $expected = [
            'ssid' => [
                '_isUnique' => 'Ya existe un enlace con el mismo ssid'
            ]
        ];
        $this->Enlaces->save($enlace);
        $this->assertSame($expected, $enlace->getErrors());
    }
}
