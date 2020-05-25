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
        $this->get('/api/reguladores.json');
        $this->assertResponseContains('"count": 7');
        
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
            'ip' => '192.168.10.154'
        ];
        $this->post('/api/reguladores.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $regulador = TableRegistry::getTableLocator()->get('Reguladores');
        $queryTest1 = $regulador->find()->where(['ip' => $dataTest1['ip']]);
        $this->assertEquals(1, $queryTest1->count());
        
        $this->assertResponseContains('"message": "El regulador fue registrado correctamente"');
        
        // en caso se repita el codigo
        $dataTest2 = [
            'modelo_id' => 2,
            'central_id' => 3,
            'punto_id' => 5,
            'puerto_id' => 1,
            'codigo' => '20',
            'ip' => '192.168.90.8'
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
            'ip' => '192.168.10.25'
        ];
        $this->post('/api/reguladores.json', $dataTest3);
        $this->assertResponseCode(200);       
        $this->assertResponseContains('"message": "El regulador no fue registrado correctamente"');
    }
}
