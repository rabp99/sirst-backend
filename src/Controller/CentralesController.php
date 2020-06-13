<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Centrales Controller
 *
 * @property \App\Model\Table\CentralesTable $Centrales
 *
 * @method \App\Model\Entity\Centrale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CentralesController extends AppController
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
        $descripcion = $this->request->getQuery('descripcion');
        $itemsPerPage = $this->request->getQuery('itemsPerPage');
        
        $this->paginate = [
            'limit' => $itemsPerPage
        ];
        
        $query = $this->Centrales->find()->order(['Centrales.id']);
        $query->where(['Centrales.estado_id' => 1]);
        
        if ($descripcion) {
            $query->where(['Centrales.descripcion like' => '%' . $descripcion . '%']);
        }
        /*
        if ($nro) {
            $query->where(['Centrales.nro' => $nro]);
        }
        */
        $count = $query->count();
        $centrales = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Centrales'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('centrales', 'pagination', 'count'));
        $this->set('_serialize', ['centrales', 'pagination', 'count']);
    }

    /**
     * View method
     *
     * @param string|null $id Centrale id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $central = $this->Centrales->get($id);

        $this->set(compact('central'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $central = $this->Centrales->newEntity();
        
        if ($this->request->is('post')) {
            $central = $this->Centrales->patchEntity($central, $this->request->getData());
            if ($this->Centrales->save($central)) {
                $message = 'La central fue registrada correctamente';
            } else {
                $message = 'La central no fue registrada correctamente';
                $errors = $central->getErrors();
            }
        }
        $this->set(compact('central', 'message', 'errors'));
        $this->set('_serialize', ['central', 'message', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Central id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $central = $this->Centrales->get($id);
        if ($this->request->is('put')) {
            $central = $this->Centrales->patchEntity($central, $this->request->getData());
            if ($this->Centrales->save($central)) {
                $message = 'La central fue modificada correctamente';
            } else {
                $message = 'La central no fue modificada correctamente';
                $errors = $central->getErrors();
            }
        }
        $this->set(compact('central', 'message', 'errors'));
        $this->set('_serialize', ['central', 'message', 'errors']);
    }

    /**
     * Enable method
     *
     * @param string|null $id Centrale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enable($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $centrale = $this->Centrales->get($id);
        if ($this->Centrales->delete($centrale)) {
            $this->Flash->success(__('The centrale has been deleted.'));
        } else {
            $this->Flash->error(__('The centrale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Disable method
     *
     * @param string|null $id Centrale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disable($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $centrale = $this->Centrales->get($id);
        if ($this->Centrales->delete($centrale)) {
            $this->Flash->success(__('The centrale has been deleted.'));
        } else {
            $this->Flash->error(__('The centrale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
