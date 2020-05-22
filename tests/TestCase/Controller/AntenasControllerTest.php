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
        
        $this->get('/api/antenas.json?punto_id=1');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/antenas.json?enlace_id=2');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/antenas.json?modelo_id=2');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/antenas.json?puerto_id=1');
        $this->assertResponseContains('"count": 7');
        
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
        $data = [
            'punto_id' => 2,
            'enlace_id' => 2,
            'modelo_id' => 3,
            'puerto_id' => 1,
            'ip' => '192.168.90.154',
            'device_name' => 'CRUCE_34_24_ST',
            'mode' => 'ST'
        ];
        $this->post('/api/antenas.json', $data);
        $this->assertResponseCode(200);
        
        $antenas = TableRegistry::getTableLocator()->get('Antenas');
        $query = $antenas->find()->where(['ip' => $data['ip']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "La antena fue registrada correctamente"');
    }
}
