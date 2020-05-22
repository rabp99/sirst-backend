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
        $this->assertResponseContains('"count": 7');
        
        $this->get('/api/t_switches.json?modelo_id=1');
        $this->assertResponseContains('"count": 4');
        
        $this->get('/api/t_switches.json?punto_id=2');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/t_switches.json?ip=10.3');
        $this->assertResponseContains('"count": 2');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $data = [
            'modelo_id' => 3,
            'punto_id' => 2,
            'ip' => '192.168.20.21'
        ];
        $this->post('/api/t_switches.json', $data);
        $this->assertResponseCode(200);
        
        $tSwitches = TableRegistry::getTableLocator()->get('TSwitches');
        $query = $tSwitches->find()->where(['ip' => $data['ip']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "El switch fue registrado correctamente"');
    }
}
