<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\CrucesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CrucesController Test Case
 */
class CrucesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cruces',
        'app.Puntos',
        'app.Reguladores'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/cruces.json');
        $this->assertResponseContains('"count": 8');
        
        $this->get('/api/cruces.json?regulador_id=2');
        $this->assertResponseContains('"count": 3');
        
        $this->get('/api/cruces.json?codigo=78');
        $this->assertResponseContains('"count": 1');
        
        $this->get('/api/cruces.json?descripcion=Ca.');
        $this->assertResponseContains('"count": 2');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $data = [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '98',
            'descripcion' => 'Av. América Este'
        ];
        $this->post('/api/cruces.json', $data);
        $this->assertResponseCode(200);
        
        $cruces = TableRegistry::getTableLocator()->get('Cruces');
        $query = $cruces->find()->where(['codigo' => $data['codigo']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "El cruce fue registrado correctamente"');
    }
}
