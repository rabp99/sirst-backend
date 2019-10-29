<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Puertos Controller
 *
 * @property \App\Model\Table\PuertosTable $Puertos
 *
 * @method \App\Model\Entity\Puerto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PuertosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['TSwitches']
        ];
        $puertos = $this->paginate($this->Puertos);

        $this->set(compact('puertos'));
    }

    /**
     * View method
     *
     * @param string|null $id Puerto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $puerto = $this->Puertos->get($id, [
            'contain' => ['TSwitches']
        ]);

        $this->set('puerto', $puerto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $puerto = $this->Puertos->newEntity();
        if ($this->request->is('post')) {
            $puerto = $this->Puertos->patchEntity($puerto, $this->request->getData());
            if ($this->Puertos->save($puerto)) {
                $this->Flash->success(__('The puerto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The puerto could not be saved. Please, try again.'));
        }
        $tSwitches = $this->Puertos->TSwitches->find('list', ['limit' => 200]);
        $this->set(compact('puerto', 'tSwitches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Puerto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $puerto = $this->Puertos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $puerto = $this->Puertos->patchEntity($puerto, $this->request->getData());
            if ($this->Puertos->save($puerto)) {
                $this->Flash->success(__('The puerto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The puerto could not be saved. Please, try again.'));
        }
        $tSwitches = $this->Puertos->TSwitches->find('list', ['limit' => 200]);
        $this->set(compact('puerto', 'tSwitches'));
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
