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
        /*
        $this->get('/api/centrales.json?nro=2');
        $this->assertResponseContains('"count": 1');
        
        $this->get('/api/centrales.json?descripcion=España&nro=4');
        $this->assertResponseContains('"count": 0');
         * 
         */
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $dataTest1 = [
            'descripcion' => 'Central 5 Extra',
            'nro' => '5'
        ];
        $this->post('/api/centrales.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $centrales = TableRegistry::getTableLocator()->get('Centrales');
        $queryTest1 = $centrales->find()->where(['descripcion' => $dataTest1['descripcion']]);
        $this->assertEquals(1, $queryTest1->count());
        
        $this->assertResponseContains('"message": "La central fue registrada correctamente"');
        
        // en caso se repita la descripción
        $dataTest2 = [
            'descripcion' => 'Central 5 Extra',
            'nro' => '9'
        ];
        $this->post('/api/centrales.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La central no fue registrada correctamente"');
        
        // en caso se repita el nro
        $dataTest3 = [
            'descripcion' => 'Central 31 Extra',
            'nro' => '5'
        ];
        $this->post('/api/centrales.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La central no fue registrada correctamente"');
    }
}
