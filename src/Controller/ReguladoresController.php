<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reguladores Controller
 *
 * @property \App\Model\Table\ReguladoresTable $Reguladores
 *
 * @method \App\Model\Entity\Reguladore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReguladoresController extends AppController
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
        $modeloDescripcion = $this->request->getQuery('modeloDescripcion');
        $centralNro = $this->request->getQuery('centralNro');
        $puntoDescripcion = $this->request->getQuery('puntoDescripcion');
        $codigo = $this->request->getQuery('codigo');
        $ip = $this->request->getQuery('ip');
        $itemsPerPage = $this->request->getQuery('itemsPerPage');
        
        $this->paginate = [
            'limit' => $itemsPerPage
        ];
        
        $query = $this->Reguladores->find()
            ->contain(['Modelos', 'Centrales', 'Puntos', 'Puertos'])->order(['Reguladores.id']);
        $query->where(['Reguladores.estado_id' => 1]);
        
        if ($modeloDescripcion) {
            $query->where(['Modelos.descripcion LIKE' => '%' . $modeloDescripcion . '%']);
        }
        
        if ($centralNro) {
            $query->where(['Centrales.nro' => $centralNro]);
        }
        
        if ($puntoDescripcion) {
            $query->where(['Puntos.descripcion LIKE' => '%' . $puntoDescripcion . '%']);
        }
        
        if ($codigo) {
            $query->where(['Reguladores.codigo LIKE' => '%' . $codigo . '%']);
        }
        
        if ($ip) {
            $query->where(['Reguladores.ip LIKE' => '%' . $ip . '%']);
        }
        
        $count = $query->count();
        $reguladores = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Reguladores'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('reguladores', 'pagination', 'count'));
        $this->set('_serialize', ['reguladores', 'pagination', 'count']);
    }

    /**
     * View method
     *
     * @param string|null $id Regulador id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $regulador = $this->Reguladores->get($id, [
            'contain' => ['Modelos', 'Centrales', 'Puntos', 'Puertos']
        ]);

        $this->set(compact('regulador'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $regulador = $this->Reguladores->newEntity();
        if ($this->request->is('post')) {
            $regulador = $this->Reguladores->patchEntity($regulador, $this->request->getData());
            if ($this->Reguladores->save($regulador)) {
                $message = 'El regulador fue registrado correctamente';
            } else {
                $message = 'El regulador no fue registrado correctamente';
                $errors = $regulador->getErrors();
            }
        }
        $this->set(compact('regulador', 'message', 'errors'));
        $this->set('_serialize', ['regulador', 'message', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Regulador id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $regulador = $this->Reguladores->get($id);
        if ($this->request->is('put')) {
            $regulador = $this->Reguladores->patchEntity($regulador, $this->request->getData());
            if ($this->Reguladores->save($regulador)) {
                $message = 'El regulador fue modificado correctamente';
            } else {
                $message = 'El regulador no fue modificado correctamente';
                $errors = $regulador->getErrors();
            }
        }
        $this->set(compact('regulador', 'message', 'errors'));
        $this->set('_serialize', ['regulador', 'message', 'errors']);
    }

    /**
     * Enable method
     *
     * @param string|null $id Regulador id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enable($id = null) {
        $this->request->allowMethod(['post']);
        $regulador = $this->Reguladores->get($id);
        $regulador->estado_id = 1;
        if ($this->Reguladores->save($regulador)) {
            $message = 'El regulador fue habilitado correctamente';
        } else {
            $message = 'La regulador no fue habilitado correctamente';
            $errors = $regulador->getErrors();
        }

        $this->set(compact('regulador', 'message', 'errors'));
        $this->set('_serialize', ['regulador', 'message', 'errors']);
    }
    
    /**
     * Disable method
     *
     * @param string|null $id Regulador id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disable($id = null) {
        $this->request->allowMethod(['post']);
        $regulador = $this->Reguladores->get($id);
        $regulador->estado_id = 2;
        if ($this->Reguladores->save($regulador)) {
            $message = 'El regulador fue deshabilitado correctamente';
        } else {
            $message = 'La regulador no fue deshabilitado correctamente';
            $errors = $regulador->getErrors();
        }

        $this->set(compact('regulador', 'message', 'errors'));
        $this->set('_serialize', ['regulador', 'message', 'errors']);
    }
}
