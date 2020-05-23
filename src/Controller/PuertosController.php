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
    public function initialize() {
        parent::initialize();
        $this->Auth->allow([]);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $tSwitchId = $this->request->getQuery('t_switch_id');
        $nroPuerto = $this->request->getQuery('nro_puerto');
        $items_per_page = $this->request->getQuery('items_per_page');
        
        $this->paginate = [
            'limit' => $items_per_page
        ];
        
        $query = $this->Puertos->find()
            ->contain(['TSwitches'])->order(['Puertos.id']);;
        
        if ($tSwitchId) {
            $query->where(['Puertos.t_switch_id' => $tSwitchId]);
        }
        
        if ($nroPuerto) {
            $query->where(['Puertos.nro_puerto' => $nroPuerto]);
        }
                
        $count = $query->count();
        $puertos = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Puertos'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('puertos', 'pagination', 'count'));
        $this->set('_serialize', ['puertos', 'pagination', 'count']);
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

        $this->set(compact('puerto'));
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
