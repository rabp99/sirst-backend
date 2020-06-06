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
        $reguladorCodigo = $this->request->getQuery('reguladorCodigo');
        $codigo = $this->request->getQuery('codigo');
        $descripcion = $this->request->getQuery('descripcion');
        $itemsPerPage = $this->request->getQuery('items_per_page');
        
        $this->paginate = [
            'limit' => $itemsPerPage
        ];
        
        $query = $this->Cruces->find()
            ->contain(['Reguladores'])->order(['Cruces.id']);
        $query->where(['Cruces.estado_id' => 1]);
        
        if ($reguladorCodigo) {
            $query->where(['Reguladores.codigo LIKE' => '%' . $reguladorCodigo . '%']);
        }
        
        if ($codigo) {
            $query->where(['Cruces.codigo LIKE' => '%' . $codigo . '%']);
        }
        
        if ($descripcion) {
            $query->where(['Cruces.descripcion LIKE' => '%' . $descripcion . '%']);
        }
        
        $count = $query->count();
        $cruces = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Cruces'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('cruces', 'pagination', 'count'));
        $this->set('_serialize', ['cruces', 'pagination', 'count']);
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

        $this->set(compact('cruce'));
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
                $message = 'El cruce fue registrado correctamente';
            } else {
                $message = 'El cruce no fue registrado correctamente';
                $errors = $cruce->getErrors();
            }
        }
        $this->set(compact('cruce', 'message', 'errors'));
        $this->set('_serialize', ['cruce', 'message', 'errors']);
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
