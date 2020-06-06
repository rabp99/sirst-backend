<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\CentralesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CentralesController Test Case
 */
class CentralesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.Centrales'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/centrales.json');
        $this->assertResponseContains('"count": 4');
        
        $this->get('/api/centrales.json?descripcion=Cent');
        $this->assertResponseContains('"count": 4');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $dataTest1 = [
            'descripcion' => 'Central 6 Extra',
            'nro' => '6',
            'estado_id' => 1
        ];
        $this->post('/api/centrales.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $centrales = TableRegistry::getTableLocator()->get('Centrales');
        $queryTest1 = $centrales->find()->where(['descripcion' => $dataTest1['descripcion']]);
        $this->assertEquals(1, $queryTest1->count());
        
        $this->assertResponseContains('"message": "La central fue registrada correctamente"');
        
        // en caso se repita la descripción
        $dataTest2 = [
            'descripcion' => 'Central 6 Extra',
            'nro' => '9',
            'estado_id' => 1
        ];
        $this->post('/api/centrales.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La central no fue registrada correctamente"');
        
        // en caso se repita el nro
        $dataTest3 = [
            'descripcion' => 'Central 31 Extra',
            'nro' => '4',
            'estado_id' => 1
        ];
        $this->post('/api/centrales.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La central no fue registrada correctamente"');
        
        // En caso se desee agregar una central con descripcion repetido desactivado
        $dataTest4 = [
            'descripcion' => 'Central 5',
            'nro' => '8',
            'estado_id' => 1
        ];
        $this->post('/api/centrales.json', $dataTest4);
        $this->assertResponseCode(200);
        
        $queryTest4 = $centrales->find()->where(['descripcion' => $dataTest4['descripcion'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest4->count());
        $this->assertResponseContains('"message": "La central fue registrada correctamente"');
                
        // En caso se desee agregar un punto con numero repetido desactivado
        $dataTest5 = [
            'descripcion' => 'Central 55',
            'nro' => '5',
            'estado_id' => 1
        ];
        $this->post('/api/centrales.json', $dataTest5);
        $this->assertResponseCode(200);
        
        $queryTest5 = $centrales->find()->where(['nro' => $dataTest5['nro'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest5->count());
        $this->assertResponseContains('"message": "La central fue registrada correctamente"');
        
        // En caso se desee agregar una central con descripcion activo y desactivado
        $this->post('/api/centrales.json', $dataTest4);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La central no fue registrada correctamente"');
        
        // En caso se desee agregar una central con nro activo y desactivado
        $this->post('/api/centrales.json', $dataTest5);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La central no fue registrada correctamente"');
    }
}
