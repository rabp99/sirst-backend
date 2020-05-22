<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\MarcasController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MarcasController Test Case
 */
class MarcasControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Marcas',
        'app.Modelos'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/api/marcas.json');
        $this->assertResponseContains('"count": 5');
        
        $this->get('/api/marcas.json?descripcion=Epson');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/marcas.json?descripcion=HP');
        $this->assertResponseContains('"count": 1');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $data = [
            'descripcion' => 'Nueva Marca XX'
        ];
        $this->post('/api/marcas.json', $data);
        $this->assertResponseCode(200);
        
        $marcas = TableRegistry::getTableLocator()->get('Marcas');
        $query = $marcas->find()->where(['descripcion' => $data['descripcion']]);
        $this->assertEquals(1, $query->count());
        
        $this->assertResponseContains('"message": "La marca fue registrada correctamente"');
    }
}
