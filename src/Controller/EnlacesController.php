<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Enlaces Controller
 *
 * @property \App\Model\Table\EnlacesTable $Enlaces
 *
 * @method \App\Model\Entity\Enlace[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnlacesController extends AppController
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
        $ssid = $this->request->getQuery('ssid');
        $channel_width = $this->request->getQuery('channel_width');
        $items_per_page = $this->request->getQuery('items_per_page');
        
        $this->paginate = [
            'limit' => $items_per_page
        ];
        
        $query = $this->Enlaces->find();
        
        if ($ssid) {
            $query->where(['Enlaces.ssid like' => '%' . $ssid . '%']);
        }
        
        if ($channel_width) {
            $query->where(['Enlaces.channel_width' => $channel_width]);
        }
        
        $count = $query->count();
        $enlaces = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Enlaces'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('enlaces', 'pagination', 'count'));
        $this->set('_serialize', ['enlaces', 'pagination', 'count']);
    }

    /**
     * View method
     *
     * @param string|null $id Enlace id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $enlace = $this->Enlaces->get($id, [
            'contain' => ['Antenas']
        ]);

        $this->set(compact('enlace'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $enlace = $this->Enlaces->newEntity();
        if ($this->request->is('post')) {
            $enlace = $this->Enlaces->patchEntity($enlace, $this->request->getData());
            if ($this->Enlaces->save($enlace)) {
                $code = 200;
                $message = 'El enlace fue registrado correctamente';
            } else {
                $message = 'El enlace no fue registrado correctamente';
            }
        }
        $this->set(compact('enlace', 'code', 'message'));
        $this->set('_serialize', ['enlace', 'code', 'message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Enlace id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $enlace = $this->Enlaces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enlace = $this->Enlaces->patchEntity($enlace, $this->request->getData());
            if ($this->Enlaces->save($enlace)) {
                $this->Flash->success(__('The enlace has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enlace could not be saved. Please, try again.'));
        }
        $this->set(compact('enlace'));
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
