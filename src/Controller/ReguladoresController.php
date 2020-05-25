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
        $modeloDescripcion = $this->request->getQuery('modeloDescripcion');
        $centralNro = $this->request->getQuery('centralNro');
        $puntoDescripcion = $this->request->getQuery('puntoDescripcion');
        $codigo = $this->request->getQuery('codigo');
        $ip = $this->request->getQuery('ip');
        $itemsPerPage = $this->request->getQuery('itemsPerPage');
        
        $this->paginate = [
            'limit' => $itemsPerPage
        ];
        
        $query = $this->Reguladores->find()
            ->contain(['Modelos', 'Centrales', 'Puntos', 'Puertos'])->order(['Reguladores.id']);;
        
        if ($modeloDescripcion) {
            $query->where(['Modelos.descripcion LIKE' => '%' . $modeloDescripcion . '%']);
        }
        
        if ($centralNro) {
            $query->where(['Centrales.nro' => $centralNro]);
        }
        
        if ($puntoDescripcion) {
            $query->where(['Puntos.descripcion LIKE' => '%' . $puntoDescripcion . '%']);
        }
        
        if ($codigo) {
            $query->where(['Reguladores.codigo LIKE' => '%' . $codigo . '%']);
        }
        
        if ($ip) {
            $query->where(['Reguladores.ip LIKE' => '%' . $ip . '%']);
        }
        
        $count = $query->count();
        $reguladores = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Reguladores'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('reguladores', 'pagination', 'count'));
        $this->set('_serialize', ['reguladores', 'pagination', 'count']);
    }

    /**
     * View method
     *
     * @param string|null $id Reguladore id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $regulador = $this->Reguladores->get($id, [
            'contain' => ['Modelos', 'Centrales', 'Puntos', 'Puertos']
        ]);

        $this->set(compact('regulador'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $regulador = $this->Reguladores->newEntity();
        if ($this->request->is('post')) {
            $regulador = $this->Reguladores->patchEntity($regulador, $this->request->getData());
            if ($this->Reguladores->save($regulador)) {
                $code = 200;
                $message = 'El regulador fue registrado correctamente';
            } else {
                $message = 'El regulador no fue registrado correctamente';
                $errors = $regulador->getErrors();
            }
        }
        $this->set(compact('regulador', 'code', 'message', 'errors'));
        $this->set('_serialize', ['regulador', 'code', 'message', 'errors']);
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
