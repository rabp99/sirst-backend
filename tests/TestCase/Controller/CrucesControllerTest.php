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
        
        $this->get('/api/cruces.json?reguladorCodigo=65');
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
        $dataTest1 = [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '98',
            'descripcion' => 'Av. América Este'
        ];
        $this->post('/api/cruces.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $cruces = TableRegistry::getTableLocator()->get('Cruces');
        $query = $cruces->find()->where(['codigo' => $dataTest1['codigo']]);
        $this->assertEquals(1, $query->count());
        $this->assertResponseContains('"message": "El cruce fue registrado correctamente"');
        
        // En caso se duplique el código
        $dataTest2 = [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '78',
            'descripcion' => 'Av. Algo'
        ];
        $this->post('/api/cruces.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
        
        // En caso se duplique el código
        $dataTest3 = [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '421',
            'descripcion' => 'Ca. San Martín'
        ];
        $this->post('/api/cruces.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
    }
}
