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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $puntos = $this->paginate($this->Puntos);

        $this->set(compact('puntos'));
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

        $this->set('punto', $punto);
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
                $this->Flash->success(__('The punto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The punto could not be saved. Please, try again.'));
        }
        $this->set(compact('punto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Punto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $punto = $this->Puntos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $punto = $this->Puntos->patchEntity($punto, $this->request->getData());
            if ($this->Puntos->save($punto)) {
                $this->Flash->success(__('The punto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The punto could not be saved. Please, try again.'));
        }
        $this->set(compact('punto'));
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
