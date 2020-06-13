<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Antenas Controller
 *
 * @property \App\Model\Table\AntenasTable $Antenas
 *
 * @method \App\Model\Entity\Antena[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AntenasController extends AppController
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
        $puntoDescripicion = $this->request->getQuery('puntoDescripcion');
        $enlaceSsid = $this->request->getQuery('enlaceSsid');
        $modeloDescripcion = $this->request->getQuery('modeloDescripcion');
        $ip = $this->request->getQuery('ip');
        $deviceName = $this->request->getQuery('device_name');
        $mode = $this->request->getQuery('mode');
        $itemsPerPage = $this->request->getQuery('itemsPerPage');
        
        $this->paginate = [
            'limit' => $itemsPerPage
        ];
        
        $query = $this->Antenas->find()
            ->contain(['Puntos', 'Enlaces', 'Modelos', 'Puertos'])->order(['Antenas.id']);
        $query->where(['Antenas.estado_id' => 1]);
        
        if ($puntoDescripicion) {
            $query->where(['Puntos.descripcion LIKE' => '%' . $puntoDescripicion . '%']);
        }
        
        if ($enlaceSsid) {
            $query->where(['Enlaces.ssid LIKE' => '%' . $enlaceSsid . '%']);
        }
        
        if ($modeloDescripcion) {
            $query->where(['Modelos.descripcion LIKE' => '%' . $modeloDescripcion . '%']);
        }
        
        if ($ip) {
            $query->where(['Antenas.ip LIKE' => '%' . $ip . '%']);
        }
        
        if ($deviceName) {
            $query->where(['Antenas.device_name LIKE' => '%' . $deviceName . '%']);
        }
        
        if ($mode) {
            $query->where(['Antenas.mode' => $mode]);
        }
        
        $count = $query->count();
        $antenas = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Antenas'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('antenas', 'pagination', 'count'));
        $this->set('_serialize', ['antenas', 'pagination', 'count']);
    }

    /**
     * View method
     *
     * @param string|null $id Antena id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $antena = $this->Antenas->get($id, [
            'contain' => ['Puntos', 'Enlaces', 'Modelos', 'Puertos']
        ]);

        $this->set(compact('antena'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $antena = $this->Antenas->newEntity();
        if ($this->request->is('post')) {
            $antena = $this->Antenas->patchEntity($antena, $this->request->getData());
            if ($this->Antenas->save($antena)) {
                $message = 'La antena fue registrada correctamente';
                $advertencia = $this->Antenas->ifIpExists($antena);
            } else {
                $message = 'La antena no fue registrada correctamente';
                $errors = $antena->getErrors();
            }
        }
        $this->set(compact('antena', 'message', 'errors', 'advertencia'));
        $this->set('_serialize', ['antena', 'message', 'errors', 'advertencia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Antena id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $antena = $this->Antenas->get($id);
        if ($this->request->is('put')) {
            $antena = $this->Antenas->patchEntity($antena, $this->request->getData());
            if ($this->Antenas->save($antena)) {
                $message = 'La antena fue modificada correctamente';
                $advertencia = $this->Antenas->ifIpExists($antena);
            } else {
                $message = 'La antena no fue modificada correctamente';
                $errors = $antena->getErrors();
            }
        }
        $this->set(compact('antena', 'message', 'errors', 'advertencia'));
        $this->set('_serialize', ['antena', 'message', 'errors', 'advertencia']);
    }

    /**
     * Enable method
     *
     * @param string|null $id Antena id.
     * @return \Cake\Http\Response|null Redirects on successful enable.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enable($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $antena = $this->Antenas->get($id);
        if ($this->Antenas->delete($antena)) {
            $this->Flash->success(__('The antena has been deleted.'));
        } else {
            $this->Flash->error(__('The antena could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Disable method
     *
     * @param string|null $id Antena id.
     * @return \Cake\Http\Response|null Redirects on successful disable.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disable($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $antena = $this->Antenas->get($id);
        if ($this->Antenas->delete($antena)) {
            $this->Flash->success(__('The antena has been deleted.'));
        } else {
            $this->Flash->error(__('The antena could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Try Connection method
     *
     * @param string|null $id Antena id.
     * @return \Cake\Http\Response|null Redirects on successful connection.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function tryConnection($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $antena = $this->Antenas->get($id);
        if ($this->Antenas->delete($antena)) {
            $this->Flash->success(__('The antena has been deleted.'));
        } else {
            $this->Flash->error(__('The antena could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
