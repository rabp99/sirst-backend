<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\MarcasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MarcasController Test Case
 */
class MarcasControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.Marcas',
        'app.Modelos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/marcas.json');
        $this->assertResponseContains('"count": 5');
        
        $this->get('/api/marcas.json?descripcion=Epson');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/marcas.json?descripcion=HP');
        $this->assertResponseContains('"count": 1');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $dataTest1 = [
            'descripcion' => 'Nueva Marca XX',
            'estado_id' => 1
        ];
        $this->post('/api/marcas.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $marcas = TableRegistry::getTableLocator()->get('Marcas');
        $queryTest1 = $marcas->find()->where(['descripcion' => $dataTest1['descripcion']]);
        $this->assertEquals(1, $queryTest1->count());
        
        $this->assertResponseContains('"message": "La marca fue registrada correctamente"');

        // En caso se duplique la descripcion
        $this->post('/api/marcas.json', $dataTest1);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La marca no fue registrada correctamente"');
        
        // En caso se desee agregar una marca con descripcion duplicada pero desactivado
        $dataTest2 = [
            'descripcion' => 'Apple',
            'estado_id' => 1
        ];
        $this->post('/api/marcas.json', $dataTest2);
        $this->assertResponseCode(200);
        
        $queryTest2 = $marcas->find()->where(['descripcion' => $dataTest2['descripcion'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest2->count());
        $this->assertResponseContains('"message": "La marca fue registrada correctamente"');
        
        // En caso se desee agregar una marca con descripcion activo y desactivado
        $this->post('/api/marcas.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La marca no fue registrada correctamente"');
        
    }
}
