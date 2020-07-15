<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Puntos Controller
 *
 * @property \App\Model\Table\PuntosTable $Puntos
 *
 * @method \App\Model\Entity\Punto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PuntosController extends AppController
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
        $codigo = $this->request->getQuery('codigo');
        $descripcion = $this->request->getQuery('descripcion');
        $itemsPerPage = $this->request->getQuery('itemsPerPage');
        
        $this->paginate = [
            'limit' => $itemsPerPage
        ];
        
        $query = $this->Puntos->find()->order(['Puntos.id']);
        $query->where(['Puntos.estado_id' => 1]);
        
        if ($codigo) {
            $query->where(['Puntos.codigo' => $codigo]);
        }
        
        if ($descripcion) {
            $query->where(['Puntos.descripcion LIKE' => '%' . $descripcion . '%']);
        }
        
        $count = $query->count();
        $puntos = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Puntos'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('puntos', 'pagination', 'count'));
        $this->set('_serialize', ['puntos', 'pagination', 'count']);
    }
    
    /**
     * View method
     *
     * @param string|null $id Punto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $punto = $this->Puntos->get($id, [
            'contain' => ['Antenas', 'Cruces', 'Reguladores', 'TSwitches']
        ]);

        $this->set(compact('punto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $punto = $this->Puntos->newEntity();
        if ($this->request->is('post')) {
            $punto = $this->Puntos->patchEntity($punto, $this->request->getData());
            if ($this->Puntos->save($punto)) {
                $message = 'El punto fue registrado correctamente';
            } else {
                $message = 'El punto no fue registrado correctamente';
                $errors = $punto->getErrors();
            }
        }
        $this->set(compact('punto', 'message', 'errors'));
        $this->set('_serialize', ['punto', 'message', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Punto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $punto = $this->Puntos->get($id);
        if ($this->request->is('put')) {
            $punto = $this->Puntos->patchEntity($punto, $this->request->getData());
            if ($this->Puntos->save($punto)) {
                $message = 'El punto fue modificado correctamente';
            } else {
                $message = 'El punto no fue modificado correctamente';
                $errors = $punto->getErrors();
            }
        }
        $this->set(compact('punto', 'message', 'errors'));
        $this->set('_serialize', ['punto', 'message', 'errors']);
    }
    
    /**
     * Enable method
     *
     * @param string|null $id Punto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enable($id = null) {
        $this->request->allowMethod(['post']);
        $punto = $this->Puntos->get($id);
        $punto->estado_id = 1;
        if ($this->Puntos->save($punto)) {
            $message = 'El punto fue habilitado correctamente';
        } else {
            $message = 'El punto no fue habilitado correctamente';
            $errors = $punto->getErrors();
        }

        $this->set(compact('punto', 'message', 'errors'));
        $this->set('_serialize', ['punto', 'message', 'errors']);
    }
    
    /**
     * Disable method
     *
     * @param string|null $id Punto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disable($id = null) {
        $this->request->allowMethod(['post']);
        $punto = $this->Enlaces->get($id);
        $punto->estado_id = 2;
        if ($this->Enlaces->save($punto)) {
            $message = 'El punto fue deshabilitado correctamente';
        } else {
            $message = 'El punto no fue deshabilitado correctamente';
            $errors = $punto->getErrors();
        }

        $this->set(compact('punto', 'message', 'errors'));
        $this->set('_serialize', ['punto', 'message', 'errors']);
    }
}
