<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AntenasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\AntenasController Test Case
 */
class AntenasControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.Antenas',
        'app.Puntos',
        'app.Enlaces',
        'app.Modelos',
        'app.Puertos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/antenas.json');
        $this->assertResponseContains('"count": 7');
        
        $this->get('/api/antenas.json?puntoDescripcion=UPAO');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/antenas.json?enlaceSsid=15_24');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/antenas.json?modeloDescripcion=media');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/antenas.json?ip=192.168.20.');
        $this->assertResponseContains('"count": 4');
        
        $this->get('/api/antenas.json?device_name=CRUCE_15');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/antenas.json?mode=ST');
        $this->assertResponseContains('"count": 4');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $dataTest1 = [
            'punto_id' => 2,
            'enlace_id' => 2,
            'modelo_id' => 3,
            'puerto_id' => 1,
            'ip' => '192.168.90.154',
            'device_name' => 'CRUCE_34_24_ST',
            'mode' => 'ST',
            'estado_id' => 1
        ];
        $this->post('/api/antenas.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $antenas = TableRegistry::getTableLocator()->get('Antenas');
        $query = $antenas->find()->where(['ip' => $dataTest1['ip']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "La antena fue registrada correctamente"');
        $this->assertResponseContains('"advertencia": null');
        
        // En caso se duplique el device_name
        $this->post('/api/antenas.json', $dataTest1);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La antena no fue registrada correctamente"');
        
        // En caso se desee agregar una antena con device_name duplicada pero desactivado
        $dataTest2 = [
            'punto_id' => 2,
            'enlace_id' => 1,
            'modelo_id' => 2,
            'puerto_id' => 1,
            'ip' => '192.168.60.214',
            'device_name' => 'CRUCE_10_95_AP',
            'mode' => 'AP',
            'estado_id' => 1
        ];
        $this->post('/api/antenas.json', $dataTest2);
        $this->assertResponseCode(200);
        
        $queryTest2 = $antenas->find()->where(['device_name' => $dataTest2['device_name'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest2->count());
        $this->assertResponseContains('"message": "La antena fue registrada correctamente"');
        $this->assertResponseContains('"advertencia": null');
        
        // En caso se desee agregar una antena con device_name activo y desactivado
        $this->post('/api/antenas.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La antena no fue registrada correctamente"');
        
        // En caso se agregue una antena con ip repetida
        $dataTest3 = [
            'punto_id' => 3,
            'enlace_id' => 2,
            'modelo_id' => 4,
            'puerto_id' => 1,
            'ip' => '192.168.90.24',
            'device_name' => 'CRUCE_19_95_ST',
            'mode' => 'AP',
            'estado_id' => 1
        ];
        $this->post('/api/antenas.json', $dataTest3);
        $this->assertResponseCode(200);
        
        $queryTest3 = $antenas->find()->where(['device_name' => $dataTest3['device_name'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest3->count());
        $this->assertResponseContains('"message": "La antena fue registrada correctamente"');
        $this->assertResponseContains('"advertencia": "Existen 2 antenas activas con la misma ip"');
        
        // En caso se agregue una antena con ip repetida pero desactivada
        $dataTest4 = [
            'punto_id' => 2,
            'enlace_id' => 1,
            'modelo_id' => 3,
            'puerto_id' => 1,
            'ip' => '192.168.30.57',
            'device_name' => 'CRUCE_12_63_ST',
            'mode' => 'AP',
            'estado_id' => 1
        ];
        $this->post('/api/antenas.json', $dataTest4);
        $this->assertResponseCode(200);
        
        $queryTest4 = $antenas->find()->where(['device_name' => $dataTest4['device_name'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest4->count());
        $this->assertResponseContains('"message": "La antena fue registrada correctamente"');
        $this->assertResponseContains('"advertencia": null');
    }
    
    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit() {
        $dataTest1 = [
            'punto_id' => 2,
            'enlace_id' => 3,
            'modelo_id' => 4,
            'puerto_id' => 1,
            'ip' => '192.168.20.45',
            'device_name' => 'CRUCE_15_56_ST',
            'mode' => 'AP',
            'estado_id' => 1
        ];
        $this->put("/api/antenas/1.json", $dataTest1);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La antena fue modificada correctamente"');
        
        $antenas = TableRegistry::getTableLocator()->get('Antenas');
        $queryTest1 = $antenas->find()->where(['device_name' => $dataTest1['device_name']]);
        $this->assertEquals(1, $queryTest1->count());
        
        // En caso se desee modificar una antena a una antena con device_name duplicado
        $dataTest2 = [
            'punto_id' => 2,
            'enlace_id' => 3,
            'modelo_id' => 4,
            'puerto_id' => 1,
            'ip' => '192.168.20.45',
            'device_name' => 'CRUCE_15_30_AP',
            'mode' => 'AP',
            'estado_id' => 1
        ];
        $this->put('/api/antenas/1.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La antena no fue modificada correctamente"');
        
        // En caso se desee modificar una antena a una antena con device_name desactivado
        $dataTest3 = [
            'punto_id' => 2,
            'enlace_id' => 3,
            'modelo_id' => 4,
            'puerto_id' => 1,
            'ip' => '192.168.20.45',
            'device_name' => 'CRUCE_10_95_AP',
            'mode' => 'AP',
            'estado_id' => 1
        ];
        $this->put('/api/antenas/1.json', $dataTest3);
        $this->assertResponseCode(200);
        
        $queryTest2 = $antenas->find()->where(['ip' => $dataTest3['ip'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest2->count());
        $this->assertResponseContains('"message": "La antena fue modificada correctamente"');
        
        // En caso se desee modificar una antena a una antena con device_name activo y desactivado
        $this->put('/api/antenas/2.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La antena no fue modificada correctamente"');
    }
}
