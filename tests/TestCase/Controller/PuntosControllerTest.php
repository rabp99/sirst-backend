<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\PuntosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\PuntosController Test Case
 */
class PuntosControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Puntos',
        'app.Antenas',
        'app.Cruces',
        'app.Reguladores',
        'app.TSwitches'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/puntos.json');
        $this->assertResponseContains('"totalItems": 5');
        
        $this->get('/puntos.json?codigo=10');
        $this->assertResponseContains('"totalItems": 1');
        
        $this->get('/puntos.json?descripcion=América');
        $this->assertResponseContains('"totalItems": 2');
        
        $this->get('/puntos.json?codigo=10&descripcion=América');
        $this->assertResponseContains('"totalItems": 1');
        
        $this->get('/puntos.json?codigo=10&descripcion=España');
        $this->assertResponseContains('"totalItems": 0');
    }
    
    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $data = [
            'codigo' => '35',
            'descripcion' => 'Av. 29 de Diciembre',
            'latitud' => '-78.84767800',
            'longitud' => '153.61320600'
        ];
        $this->post('/puntos.json', $data);
        $this->assertResponseCode(200);
        
        $marcas = TableRegistry::getTableLocator()->get('Puntos');
        $query = $marcas->find()->where(['codigo' => $data['codigo']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "El punto fue registrado correctamente"');
    }
}
