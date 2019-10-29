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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $centrales = $this->paginate($this->Centrales);

        $this->set(compact('centrales'));
    }

    /**
     * View method
     *
     * @param string|null $id Centrale id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $centrale = $this->Centrales->get($id, [
            'contain' => []
        ]);

        $this->set('centrale', $centrale);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $centrale = $this->Centrales->newEntity();
        if ($this->request->is('post')) {
            $centrale = $this->Centrales->patchEntity($centrale, $this->request->getData());
            if ($this->Centrales->save($centrale)) {
                $this->Flash->success(__('The centrale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The centrale could not be saved. Please, try again.'));
        }
        $this->set(compact('centrale'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Centrale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $centrale = $this->Centrales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $centrale = $this->Centrales->patchEntity($centrale, $this->request->getData());
            if ($this->Centrales->save($centrale)) {
                $this->Flash->success(__('The centrale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The centrale could not be saved. Please, try again.'));
        }
        $this->set(compact('centrale'));
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
