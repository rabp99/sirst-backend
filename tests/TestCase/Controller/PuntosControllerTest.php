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
        'app.Estados',
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
        $this->get('/api/puntos.json');
        $this->assertResponseContains('"count": 5');
        
        $this->get('/api/puntos.json?codigo=10');
        $this->assertResponseContains('"count": 1');
        
        $this->get('/api/puntos.json?descripcion=América');
        $this->assertResponseContains('"count": 2');
        
        $this->get('/api/puntos.json?codigo=10&descripcion=América');
        $this->assertResponseContains('"count": 1');
        
        $this->get('/api/puntos.json?codigo=10&descripcion=España');
        $this->assertResponseContains('"count": 0');
    }
    
    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $dataTest1 = [
            'codigo' => '35',
            'descripcion' => 'Av. 29 de Diciembre',
            'latitud' => '-78.84767800',
            'longitud' => '153.61320600',
            'estado_id' => 1
        ];
        $this->post('/api/puntos.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $puntos = TableRegistry::getTableLocator()->get('Puntos');
        $queryTest1 = $puntos->find()->where(['codigo' => $dataTest1['codigo']]);
        $this->assertEquals(1, $queryTest1->count());
        
        $this->assertResponseContains('"message": "El punto fue registrado correctamente"');
        
        // En caso se ingrese un codigo repetido
        $dataTest2 = [
            'codigo' => '35',
            'descripcion' => 'dasdsa',
            'latitud' => '-78.84767200',
            'longitud' => '153.61321200',
            'estado_id' => 1
        ];
        $this->post('/api/puntos.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El punto no fue registrado correctamente"');
        
        // En caso se ingrese una descripción repetida
        $dataTest3 = [
            'codigo' => '35',
            'descripcion' => 'Av. 29 de Diciembre',
            'latitud' => '-78.84767200',
            'longitud' => '153.61321200',
            'estado_id' => 1
        ];
        $this->post('/api/puntos.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El punto no fue registrado correctamente"');
        
        // En caso se desee agregar un punto con codigo desactivado
        $dataTest4 = [
            'codigo' => '41',
            'descripcion' => 'w321321dasdsa',
            'latitud' => '-78.84767200',
            'longitud' => '153.61321200',
            'estado_id' => 1
        ];
        $this->post('/api/puntos.json', $dataTest4);
        $this->assertResponseCode(200);
        
        $queryTest4 = $puntos->find()->where(['codigo' => $dataTest4['codigo'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest4->count());
        $this->assertResponseContains('"message": "El punto fue registrado correctamente"');
                
        // En caso se desee agregar un punto con descripcion desactivada
        $dataTest5 = [
            'codigo' => '87',
            'descripcion' => 'Av. España 4',
            'latitud' => '-78.84135200',
            'longitud' => '153.61221200',
            'estado_id' => 1
        ];
        $this->post('/api/puntos.json', $dataTest5);
        $this->assertResponseCode(200);
        
        $queryTest5 = $puntos->find()->where(['codigo' => $dataTest5['codigo'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest5->count());
        $this->assertResponseContains('"message": "El punto fue registrado correctamente"');
        
        // En caso se desee agregar un punto con codigo activo y desactivado
        $this->post('/api/puntos.json', $dataTest4);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El punto no fue registrado correctamente"');
        
        // En caso se desee agregar un punto con descripcion activo y desactivado
        $this->post('/api/puntos.json', $dataTest5);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El punto no fue registrado correctamente"');
    }
}
