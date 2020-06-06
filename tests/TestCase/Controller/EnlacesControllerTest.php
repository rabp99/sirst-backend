<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\EnlacesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\EnlacesController Test Case
 */
class EnlacesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estados',
        'app.Enlaces',
        'app.Antenas'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/enlaces.json');
        $this->assertResponseContains('"count": 6');
        
        $this->get('/api/enlaces.json?ssid=11');
        $this->assertResponseContains('"count": 3');
        
        $this->get('/api/enlaces.json?channel_width=40MHZ');
        $this->assertResponseContains('"count": 3');
        
        $this->get('/api/enlaces.json?ssid=11&channel_width=40MHZ');
        $this->assertResponseContains('"count": 2');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $dataTest1 = [
            'ssid' => 'TM_24_35',
            'channel_width' => '40MHZ',
            'estado_id' => 1
        ];
        $this->post('/api/enlaces.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $enlaces = TableRegistry::getTableLocator()->get('Enlaces');
        $queryTest1 = $enlaces->find()->where(['ssid' => $dataTest1['ssid']]);
        $this->assertEquals(1, $queryTest1->count());
        $this->assertResponseContains('"message": "El enlace fue registrado correctamente"');
        
        // En caso se duplique el ssid
        $this->post('/api/enlaces.json', $dataTest1);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El enlace no fue registrado correctamente"');
        
        // En caso se desee agregar un enlace con ssid desactivado
        $dataTest2 = [
            'ssid' => 'TM_14_94',
            'channel_width' => '40MHZ',
            'estado_id' => 1
        ];
        $this->post('/api/enlaces.json', $dataTest2);
        $this->assertResponseCode(200);
        
        $queryTest2 = $enlaces->find()->where(['ssid' => $dataTest2['ssid'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest2->count());
        $this->assertResponseContains('"message": "El enlace fue registrado correctamente"');
        
        // En caso se desee agregar un enlace con ssid activo y desactivado
        $this->post('/api/enlaces.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El enlace no fue registrado correctamente"');
    }
}
