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
        $this->get('/reguladores.json');
        $this->assertResponseContains('"count": 7');
        
        $this->get('/reguladores.json?modelo_id=1');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/reguladores.json?central_id=1');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/reguladores.json?punto_id=1');
        $this->assertResponseContains('"count": 3');
        
        $this->get('/reguladores.json?puerto_id=1');
        $this->assertResponseContains('"count": 7');
        
        $this->get('/reguladores.json?codigo=65');
        $this->assertResponseContains('"count": 1');
        
        $this->get('/reguladores.json?ip=192.168.20.');
        $this->assertResponseContains('"count": 3');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $data = [
            'modelo_id' => 2,
            'central_id' => 3,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '40',
            'ip' => '192.168.10.154'
        ];
        $this->post('/reguladores.json', $data);
        $this->assertResponseCode(200);
        
        $regulador = TableRegistry::getTableLocator()->get('Reguladores');
        $query = $regulador->find()->where(['ip' => $data['ip']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "El regulador fue registrado correctamente"');
    }
}
