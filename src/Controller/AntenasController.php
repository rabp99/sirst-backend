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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Puntos', 'Enlaces', 'Modelos', 'Puertos']
        ];
        $antenas = $this->paginate($this->Antenas);

        $this->set(compact('antenas'));
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

        $this->set('antena', $antena);
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
                $this->Flash->success(__('The antena has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The antena could not be saved. Please, try again.'));
        }
        $puntos = $this->Antenas->Puntos->find('list', ['limit' => 200]);
        $enlaces = $this->Antenas->Enlaces->find('list', ['limit' => 200]);
        $modelos = $this->Antenas->Modelos->find('list', ['limit' => 200]);
        $puertos = $this->Antenas->Puertos->find('list', ['limit' => 200]);
        $this->set(compact('antena', 'puntos', 'enlaces', 'modelos', 'puertos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Antena id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $antena = $this->Antenas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $antena = $this->Antenas->patchEntity($antena, $this->request->getData());
            if ($this->Antenas->save($antena)) {
                $this->Flash->success(__('The antena has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The antena could not be saved. Please, try again.'));
        }
        $puntos = $this->Antenas->Puntos->find('list', ['limit' => 200]);
        $enlaces = $this->Antenas->Enlaces->find('list', ['limit' => 200]);
        $modelos = $this->Antenas->Modelos->find('list', ['limit' => 200]);
        $puertos = $this->Antenas->Puertos->find('list', ['limit' => 200]);
        $this->set(compact('antena', 'puntos', 'enlaces', 'modelos', 'puertos'));
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
