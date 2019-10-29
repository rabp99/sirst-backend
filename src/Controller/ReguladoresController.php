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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Modelos', 'Centrales', 'Puntos', 'Puertos']
        ];
        $reguladores = $this->paginate($this->Reguladores);

        $this->set(compact('reguladores'));
    }

    /**
     * View method
     *
     * @param string|null $id Reguladore id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $reguladore = $this->Reguladores->get($id, [
            'contain' => ['Modelos', 'Centrales', 'Puntos', 'Puertos']
        ]);

        $this->set('reguladore', $reguladore);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $reguladore = $this->Reguladores->newEntity();
        if ($this->request->is('post')) {
            $reguladore = $this->Reguladores->patchEntity($reguladore, $this->request->getData());
            if ($this->Reguladores->save($reguladore)) {
                $this->Flash->success(__('The reguladore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reguladore could not be saved. Please, try again.'));
        }
        $modelos = $this->Reguladores->Modelos->find('list', ['limit' => 200]);
        $centrales = $this->Reguladores->Centrales->find('list', ['limit' => 200]);
        $puntos = $this->Reguladores->Puntos->find('list', ['limit' => 200]);
        $puertos = $this->Reguladores->Puertos->find('list', ['limit' => 200]);
        $this->set(compact('reguladore', 'modelos', 'centrales', 'puntos', 'puertos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reguladore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $reguladore = $this->Reguladores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reguladore = $this->Reguladores->patchEntity($reguladore, $this->request->getData());
            if ($this->Reguladores->save($reguladore)) {
                $this->Flash->success(__('The reguladore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reguladore could not be saved. Please, try again.'));
        }
        $modelos = $this->Reguladores->Modelos->find('list', ['limit' => 200]);
        $centrales = $this->Reguladores->Centrales->find('list', ['limit' => 200]);
        $puntos = $this->Reguladores->Puntos->find('list', ['limit' => 200]);
        $puertos = $this->Reguladores->Puertos->find('list', ['limit' => 200]);
        $this->set(compact('reguladore', 'modelos', 'centrales', 'puntos', 'puertos'));
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
