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
        $data = [
            'ssid' => 'TM_24_35',
            'channel_width' => '40MHZ '
        ];
        $this->post('/api/enlaces.json', $data);
        $this->assertResponseCode(200);
        
        $enlaces = TableRegistry::getTableLocator()->get('Enlaces');
        $query = $enlaces->find()->where(['ssid' => $data['ssid']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "El enlace fue registrado correctamente"');
        
        // En caso se duplique el ssid
        $this->post('/api/enlaces.json', $data);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El enlace no fue registrado correctamente"');
        
    }
}
