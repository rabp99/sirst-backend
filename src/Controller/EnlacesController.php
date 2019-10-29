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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $enlaces = $this->paginate($this->Enlaces);

        $this->set(compact('enlaces'));
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

        $this->set('enlace', $enlace);
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
                $this->Flash->success(__('The enlace has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enlace could not be saved. Please, try again.'));
        }
        $this->set(compact('enlace'));
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
