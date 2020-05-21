<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MarcasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MarcasTable Test Case
 */
class MarcasTableTest extends TestCase
{
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = ['app.Marcas'];
    
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Marcas = TableRegistry::getTableLocator()->get('Marcas');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Marcas);

        parent::tearDown();
    }
    
    public function testFind() {
        $query = $this->Marcas->find();
        $this->assertInstanceOf('Cake\ORM\Query', $query);

        $result = $query->enableHydration(false)->toArray();

        $expected = [
            ['id' => 1, 'descripcion' => 'Lorem ipsum dolor sit amet']
        ];
        
        $this->assertEquals($expected, $result);
    }
}
