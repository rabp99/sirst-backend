<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\TSwitchesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TSwitchesController Test Case
 */
class TSwitchesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.TSwitches',
        'app.Modelos',
        'app.Puntos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/t_switches.json');
        $this->assertResponseContains('"count": 8');
        
        $this->get('/api/t_switches.json?modeloDescripcion=Hp%20p');
        $this->assertResponseContains('"count": 4');
        
        $this->get('/api/t_switches.json?puntoText=América');
        $this->assertResponseContains('"count": 3');
        
        $this->get('/api/t_switches.json?puntoText=4');
        $this->assertResponseContains('"count": 4');
        
        $this->get('/api/t_switches.json?ip=10.3');
        $this->assertResponseContains('"count": 2');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $dataTest1 = [
            'modelo_id' => 3,
            'punto_id' => 2,
            'ip' => '192.168.20.21',
            'estado_id' => 1
        ];
        $this->post('/api/t_switches.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $tSwitches = TableRegistry::getTableLocator()->get('TSwitches');
        $queryTest1 = $tSwitches->find()->where(['ip' => $dataTest1['ip']]);
        $this->assertEquals(1, $queryTest1->count());
        
        $this->assertResponseContains('"message": "El switch fue registrado correctamente"');

        // En caso se duplique la ip
        $this->post('/api/t_switches.json', $dataTest1);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El switch no fue registrado correctamente"');
        
        // En caso se desee agregar un switch con ip duplicada pero desactivado
        $dataTest2 = [
            'modelo_id' => 4,
            'punto_id' => 1,
            'ip' => '192.168.10.120',
            'estado_id' => 1
        ];
        $this->post('/api/t_switches.json', $dataTest2);
        $this->assertResponseCode(200);
        
        $queryTest2 = $tSwitches->find()->where(['ip' => $dataTest2['ip'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest2->count());
        $this->assertResponseContains('"message": "El switch fue registrado correctamente"');
        
        // En caso se desee agregar un switch con ip activo y desactivado
        $this->post('/api/t_switches.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El switch no fue registrado correctamente"');
        
        // En caso se desee agregar un switch con ip null
        $dataTest3 = [
            'modelo_id' => 3,
            'punto_id' => 3,
            'ip' => null,
            'estado_id' => 1
        ];
        $this->post('/api/t_switches.json', $dataTest3);
        $this->assertResponseCode(200);
        
        $queryTest3 = $tSwitches->find()->where(['ip IS NULL', 'estado_id' => 1]);
        $this->assertEquals(2, $queryTest3->count());
        $this->assertResponseContains('"message": "El switch fue registrado correctamente"');
    }
    
    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit() {
        $dataTest1 = [
            'modelo_id' => 4,
            'punto_id' => 1,
            'ip' => '192.168.10.15',
            'estado_id' => 1
        ];
        $this->put("/api/t_switches/1.json", $dataTest1);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El switch fue modificado correctamente"');
        
        $switches = TableRegistry::getTableLocator()->get('TSwitches');
        $queryTest1 = $switches->find()->where(['ip' => $dataTest1['ip']]);
        $this->assertEquals(1, $queryTest1->count());
        
        // En caso se desee modificar un switch a un switch con ip duplicada
        $dataTest2 = [
            'modelo_id' => 4,
            'punto_id' => 1,
            'ip' => '192.168.10.20',
            'estado_id' => 1
        ];
        $this->put('/api/t_switches/1.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El switch no fue modificado correctamente"');
        
        // En caso se desee modificar un switch a una switch con ip desactivado
        $dataTest3 = [
            'modelo_id' => 4,
            'punto_id' => 1,
            'ip' => '192.168.10.120',
            'estado_id' => 1
        ];
        $this->put('/api/t_switches/1.json', $dataTest3);
        $this->assertResponseCode(200);
        
        $queryTest2 = $switches->find()->where(['ip' => $dataTest3['ip'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest2->count());
        $this->assertResponseContains('"message": "El switch fue modificado correctamente"');
        
        // En caso se desee modificar un switch a un switch con ip activo y desactivado
        $this->put('/api/t_switches/2.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El switch no fue modificado correctamente"');
    }
}
