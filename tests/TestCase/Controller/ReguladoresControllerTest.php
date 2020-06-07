<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\ReguladoresController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ReguladoresController Test Case
 */
class ReguladoresControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.Reguladores',
        'app.Modelos',
        'app.Centrales',
        'app.Puntos',
        'app.Puertos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/reguladores.json');
        $this->assertResponseContains('"count": 8');
        
        $this->get('/api/reguladores.json?modeloDescripcion=HP%20p');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/reguladores.json?centralNro=1');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/reguladores.json?puntoDescripcion=UPAO');
        $this->assertResponseContains('"count": 3');
        
        $this->get('/api/reguladores.json?codigo=65');
        $this->assertResponseContains('"count": 1');
        
        $this->get('/api/reguladores.json?ip=192.168.20.');
        $this->assertResponseContains('"count": 3');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        // en caso se guarde correctamente
        $dataTest1 = [
            'modelo_id' => 2,
            'central_id' => 3,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '40',
            'ip' => '192.168.10.154',
            'estado_id' => 1
        ];
        $this->post('/api/reguladores.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $reguladores = TableRegistry::getTableLocator()->get('Reguladores');
        $queryTest1 = $reguladores->find()->where(['ip' => $dataTest1['ip']]);
        $this->assertEquals(1, $queryTest1->count());
        
        $this->assertResponseContains('"message": "El regulador fue registrado correctamente"');
        
        // en caso se repita el codigo
        $dataTest2 = [
            'modelo_id' => 2,
            'central_id' => 3,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '20',
            'ip' => '192.168.90.8',
            'estado_id' => 1
        ];
        $this->post('/api/reguladores.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El regulador no fue registrado correctamente"');
        
        // en caso se repita la ip
        $dataTest3 = [
            'modelo_id' => 2,
            'central_id' => 3,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '40',
            'ip' => '192.168.10.25',
            'estado_id' => 1
        ];
        $this->post('/api/reguladores.json', $dataTest3);
        $this->assertResponseCode(200);       
        $this->assertResponseContains('"message": "El regulador no fue registrado correctamente"');
        
        // En caso se desee agregar un regulador con codigo desactivado
        $dataTest4 = [
            'modelo_id' => 2,
            'central_id' => 3,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '74',
            'ip' => '192.168.20.140',
            'estado_id' => 1
        ];
        $this->post('/api/reguladores.json', $dataTest4);
        $this->assertResponseCode(200);
        
        $queryTest4 = $reguladores->find()->where(['codigo' => $dataTest4['codigo'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest4->count());
        $this->assertResponseContains('"message": "El regulador fue registrado correctamente"');
        
        // En caso se desee agregar un regulador con ip desactivado
        $dataTest5 = [
            'modelo_id' => 2,
            'central_id' => 3,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '49',
            'ip' => '192.168.20.14',
            'estado_id' => 1
        ];
        $this->post('/api/reguladores.json', $dataTest5);
        $this->assertResponseCode(200);
        
        $queryTest5 = $reguladores->find()->where(['ip' => $dataTest5['ip'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest5->count());
        $this->assertResponseContains('"message": "El regulador fue registrado correctamente"');
        
        // En caso se desee agregar un regulador con codigo activo y desactivado
        $this->post('/api/reguladores.json', $dataTest4);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El regulador no fue registrado correctamente"');
        
        // En caso se desee agregar un regulador con ip activo y desactivado
        $this->post('/api/reguladores.json', $dataTest5);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El regulador no fue registrado correctamente"');
        
        // En caso se desee agregar un regulador con ip null
        $dataTest6 = [
            'modelo_id' => 4,
            'central_id' => 2,
            'punto_id' => 3,
            'puerto_id' => 1,
            'codigo' => '98',
            'ip' => null,
            'estado_id' => 1
        ];
        $this->post('/api/reguladores.json', $dataTest6);
        $this->assertResponseCode(200);
        
        $queryTest6 = $reguladores->find()->where(['ip IS NULL', 'estado_id' => 1]);
        $this->assertEquals(2, $queryTest6->count());
        $this->assertResponseContains('"message": "El regulador fue registrado correctamente"');
    }
}
