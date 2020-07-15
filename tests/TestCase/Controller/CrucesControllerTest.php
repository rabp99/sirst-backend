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
        'app.Estados',
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
            'descripcion' => 'Av. América Este',
            'estado_id' => 1
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
            'descripcion' => 'Av. Algo',
            'estado_id' => 1
        ];
        $this->post('/api/cruces.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
        
        // En caso se duplique la descripcion
        $dataTest3 = [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '421',
            'descripcion' => 'Ca. San Martín',
            'estado_id' => 1
        ];
        $this->post('/api/cruces.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
        
        // En caso se desee agregar un cruce con codigo desactivado
        $dataTest4 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '69',
            'descripcion' => 'Ca.',
            'estado_id' => 1
        ];
        $this->post('/api/cruces.json', $dataTest4);
        $this->assertResponseCode(200);
        
        $queryTest4 = $cruces->find()->where(['codigo' => $dataTest4['codigo'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest4->count());
        $this->assertResponseContains('"message": "El cruce fue registrado correctamente"');
                
        // En caso se desee agregar un punto con descripcion desactivada
        $dataTest5 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '100',
            'descripcion' => 'Ca. Orbegoso',
            'estado_id' => 1
        ];
        $this->post('/api/cruces.json', $dataTest5);
        $this->assertResponseCode(200);
        
        $queryTest5 = $cruces->find()->where(['descripcion' => $dataTest5['descripcion'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest5->count());
        $this->assertResponseContains('"message": "El cruce fue registrado correctamente"');
        
        // En caso se desee agregar un cruce con codigo activo y desactivado
        $this->post('/api/cruces.json', $dataTest4);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
        
        // En caso se desee agregar un cruce con descripcion activo y desactivado
        $this->post('/api/cruces.json', $dataTest5);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
    }
    
    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit() {
        $dataTest1 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '21',
            'descripcion' => 'Av. América Sur',
            'estado_id' => 1
        ];
        $this->put("/api/cruces/1.json", $dataTest1);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce fue modificado correctamente"');
        
        $cruces = TableRegistry::getTableLocator()->get('Cruces');
        $queryTest1 = $cruces->find()->where(['codigo' => $dataTest1['codigo']]);
        $this->assertEquals(1, $queryTest1->count());
        
        // En caso se desee modificar un cruce a un cruce con codigo duplicado
        $dataTest2 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '24',
            'descripcion' => 'Av. América Sur',
            'estado_id' => 1
        ];
        $this->put('/api/cruces/1.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue modificado correctamente"');
        
        // En caso se desee modificar un cruce a un cruce con descripcion duplicado
        $dataTest3 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '21',
            'descripcion' => 'Av. España',
            'estado_id' => 1
        ];
        $this->put('/api/cruces/1.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue modificado correctamente"');
        
        // En caso se desee modificar un cruce a un cruce con codigo desactivado
        $dataTest4 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '69',
            'descripcion' => 'Av. América Sur',
            'estado_id' => 1
        ];
        $this->put('/api/cruces/1.json', $dataTest4);
        $this->assertResponseCode(200);
        
        $queryTest2 = $cruces->find()->where(['codigo' => $dataTest4['codigo'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest2->count());
        $this->assertResponseContains('"message": "El cruce fue modificado correctamente"');
        
        // En caso se desee modificar un cruce a un cruce con descripcion desactivado
        $dataTest5 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '69',
            'descripcion' => 'Ca. Orbegoso',
            'estado_id' => 1
        ];
        $this->put('/api/cruces/1.json', $dataTest5);
        $this->assertResponseCode(200);
        
        $queryTest3 = $cruces->find()->where(['codigo' => $dataTest5['codigo'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest3->count());
        $this->assertResponseContains('"message": "El cruce fue modificado correctamente"');
        
        // En caso se desee modificar un cruce a un cruce con codigo, descripcion activo y desactivado
        $this->put('/api/cruces/2.json', $dataTest5);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue modificado correctamente"');
    }
}
