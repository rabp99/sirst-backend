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
        
        // En caso se desee agregar una antena con device_name activo y desactivado
        $this->post('/api/antenas.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "La antena no fue registrada correctamente"');
    }
}
