<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\ModelosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ModelosController Test Case
 */
class ModelosControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Modelos',
        'app.Marcas'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/modelos.json');
        $this->assertResponseContains('"count": 6');
        
        $this->get('/modelos.json?marca_id=1');
        $this->assertResponseContains('"count": 3');
        
        $this->get('/modelos.json?descripcion=Dell');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/modelos.json?observacion=dolor');
        $this->assertResponseContains('"count": 6');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $data = [
            'marca_id' => 3,
            'descripcion' => 'Modelo unico',
            'observacion' => 'Lorem ipsum dolor sit amet'
        ];
        $this->post('/modelos.json', $data);
        $this->assertResponseCode(200);
        
        $modelos = TableRegistry::getTableLocator()->get('Modelos');
        $query = $modelos->find()->where(['descripcion' => $data['descripcion']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "El modelo fue registrado correctamente"');
    }
}
