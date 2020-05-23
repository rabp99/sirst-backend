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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules() {
        $marca = $this->Marcas->newEntity([
            'descripcion' => 'HP'
        ]);
        $expected = [
            'descripcion' => [
                '_isUnique' => 'Ya existe una marca con la misma descripción'
            ]
        ];
        $this->Marcas->save($marca);
        $this->assertSame($expected, $marca->getErrors());
    }
}
