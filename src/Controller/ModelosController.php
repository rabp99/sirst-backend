<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modelos Controller
 *
 * @property \App\Model\Table\ModelosTable $Modelos
 *
 * @method \App\Model\Entity\Modelo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModelosController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow();
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $marcaDescripcion = $this->request->getQuery('marcaDescripcion');
        $descripcion = $this->request->getQuery('descripcion');
        $observacion = $this->request->getQuery('observacion');
        $itemsPerPage = $this->request->getQuery('itemsPerPage');
        
        $this->paginate = [
            'limit' => $itemsPerPage
        ];
        
        $query = $this->Modelos->find()
            ->contain(['Marcas'])->order(['Modelos.id']);
        $query->where(['Modelos.estado_id' => 1]);
        
        if ($marcaDescripcion) {
            $query->where(['Marcas.descripcion LIKE' => '%' . $marcaDescripcion . '%']);
        }
        
        if ($descripcion) {
            $query->where(['Modelos.descripcion LIKE' => '%' . $descripcion . '%']);
        }
        
        if ($observacion) {
            $query->where(['Modelos.observacion LIKE' => '%' . $observacion . '%']);
        }
        
        $count = $query->count();
        $modelos = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Modelos'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('modelos', 'pagination', 'count'));
        $this->set('_serialize', ['modelos', 'pagination', 'count']);
    }

    /**
     * View method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $modelo = $this->Modelos->get($id, [
            'contain' => ['Marcas']
        ]);

        $this->set(compact('modelo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $modelo = $this->Modelos->newEntity();
        if ($this->request->is('post')) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $message = 'El modelo fue registrado correctamente';
            } else {
                $message = 'El modelo no fue registrado correctamente';
                $errors = $modelo->getErrors();
            }
        }
        $this->set(compact('modelo', 'message', 'errors'));
        $this->set('_serialize', ['modelo', 'message', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $modelo = $this->Modelos->get($id);
        if ($this->request->is('put')) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $message = 'El modelo fue modificado correctamente';
            } else {
                $message = 'El modelo no fue modificado correctamente';
                $errors = $modelo->getErrors();
            }
        }
        $this->set(compact('modelo', 'message', 'errors'));
        $this->set('_serialize', ['modelo', 'message', 'errors']);
    }

    /**
     * Enable method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enable($id = null) {
        $this->request->allowMethod(['post']);
        $modelo = $this->Modelos->get($id);
        $modelo->estado_id = 1;
        if ($this->Modelos->save($modelo)) {
            $message = 'El modelo fue habilitado correctamente';
        } else {
            $message = 'El modelo no fue habilitado correctamente';
            $errors = $modelo->getErrors();
        }

        $this->set(compact('modelo', 'message', 'errors'));
        $this->set('_serialize', ['modelo', 'message', 'errors']);
    }
    
    /**
     * Disable method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disable($id = null) {
        $this->request->allowMethod(['post']);
        $modelo = $this->Modelos->get($id);
        $modelo->estado_id = 2;
        if ($this->Modelos->save($modelo)) {
            $message = 'El modelo fue deshabilitado correctamente';
        } else {
            $message = 'El modelo no fue deshabilitado correctamente';
            $errors = $modelo->getErrors();
        }

        $this->set(compact('modelo', 'message', 'errors'));
        $this->set('_serialize', ['modelo', 'message', 'errors']);
    }
}
