<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PrixGas Controller
 *
 * @property \App\Model\Table\PrixGasTable $PrixGas
 *
 * @method \App\Model\Entity\PrixGa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrixGasController extends AppController
{
    
     public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByLieuGas', 'add', 'edit', 'delete']);
    }

    
    public function getByLieuGas() {
        $LieuGas_id = $this->request->query('Lieu_id');

        $prixGas = $this->OkresCounties->find('all', [
            'conditions' => ['LieuGas.prix_id' => $LieuGas_id],
        ]);
        $this->set('prixGas', $prixGas);
        $this->set('_serialize', ['prixGas']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['LieuGas'],
        ];
        $prixGas = $this->paginate($this->PrixGas);

        $this->set(compact('prixGas'));
    }

    /**
     * View method
     *
     * @param string|null $id Prix Ga id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prixGa = $this->PrixGas->get($id, [
            'contain' => ['LieuGas', 'NomGas'],
        ]);

        $this->set('prixGa', $prixGa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prixGa = $this->PrixGas->newEntity();
        if ($this->request->is('post')) {
            $prixGa = $this->PrixGas->patchEntity($prixGa, $this->request->getData());
            if ($this->PrixGas->save($prixGa)) {
                $this->Flash->success(__('The prix ga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prix ga could not be saved. Please, try again.'));
        }
        $lieuGas = $this->PrixGas->LieuGas->find('list', ['limit' => 200]);
        $this->set(compact('prixGa', 'lieuGas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prix Ga id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prixGa = $this->PrixGas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prixGa = $this->PrixGas->patchEntity($prixGa, $this->request->getData());
            if ($this->PrixGas->save($prixGa)) {
                $this->Flash->success(__('The prix ga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prix ga could not be saved. Please, try again.'));
        }
        $lieuGas = $this->PrixGas->LieuGas->find('list', ['limit' => 200]);
        $this->set(compact('prixGa', 'lieuGas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prix Ga id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prixGa = $this->PrixGas->get($id);
        if ($this->PrixGas->delete($prixGa)) {
            $this->Flash->success(__('The prix ga has been deleted.'));
        } else {
            $this->Flash->error(__('The prix ga could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
