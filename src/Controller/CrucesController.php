<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cruces Controller
 *
 * @property \App\Model\Table\CrucesTable $Cruces
 *
 * @method \App\Model\Entity\Cruce[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrucesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Puntos', 'Reguladores']
        ];
        $cruces = $this->paginate($this->Cruces);

        $this->set(compact('cruces'));
    }

    /**
     * View method
     *
     * @param string|null $id Cruce id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $cruce = $this->Cruces->get($id, [
            'contain' => ['Puntos', 'Reguladores']
        ]);

        $this->set('cruce', $cruce);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $cruce = $this->Cruces->newEntity();
        if ($this->request->is('post')) {
            $cruce = $this->Cruces->patchEntity($cruce, $this->request->getData());
            if ($this->Cruces->save($cruce)) {
                $this->Flash->success(__('The cruce has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruce could not be saved. Please, try again.'));
        }
        $puntos = $this->Cruces->Puntos->find('list', ['limit' => 200]);
        $reguladores = $this->Cruces->Reguladores->find('list', ['limit' => 200]);
        $this->set(compact('cruce', 'puntos', 'reguladores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cruce id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $cruce = $this->Cruces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cruce = $this->Cruces->patchEntity($cruce, $this->request->getData());
            if ($this->Cruces->save($cruce)) {
                $this->Flash->success(__('The cruce has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruce could not be saved. Please, try again.'));
        }
        $puntos = $this->Cruces->Puntos->find('list', ['limit' => 200]);
        $reguladores = $this->Cruces->Reguladores->find('list', ['limit' => 200]);
        $this->set(compact('cruce', 'puntos', 'reguladores'));
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
