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
        'app.Estados',
        'app.Modelos',
        'app.Marcas'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/modelos.json');
        $this->assertResponseContains('"count": 6');
        
        $this->get('/api/modelos.json?marcaDescripcion=Epso');
        $this->assertResponseContains('"count": 5');
        
        $this->get('/api/modelos.json?descripcion=Dell');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/modelos.json?observacion=dolor');
        $this->assertResponseContains('"count": 6');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $dataTest1 = [
            'marca_id' => 3,
            'descripcion' => 'Modelo unico',
            'observacion' => 'Lorem ipsum dolor sit amet',
            'estado_id' => 1
        ];
        $this->post('/api/modelos.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $modelos = TableRegistry::getTableLocator()->get('Modelos');
        $queryTest1 = $modelos->find()->where(['descripcion' => $dataTest1['descripcion']]);
        $this->assertEquals(1, $queryTest1->count());
        
        $this->assertResponseContains('"message": "El modelo fue registrado correctamente"');
        
        // En caso se duplique la descripcion
        $this->post('/api/modelos.json', $dataTest1);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El modelo no fue registrado correctamente"');
        
        // En caso se desee agregar un modelo con descripcion duplicada pero desactivado
        $dataTest2 = [
            'marca_id' => 2,
            'descripcion' => 'Apple X',
            'observacion' => 'Lorem ipsum dolor sit amet',
            'estado_id' => 1
        ];
        $this->post('/api/modelos.json', $dataTest2);
        $this->assertResponseCode(200);
        
        $queryTest2 = $modelos->find()->where(['descripcion' => $dataTest2['descripcion'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest2->count());
        $this->assertResponseContains('"message": "El modelo fue registrado correctamente"');
        
        // En caso se desee agregar un modelo con descripcion activo y desactivado
        $this->post('/api/modelos.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El modelo no fue registrado correctamente"');
    }
}
