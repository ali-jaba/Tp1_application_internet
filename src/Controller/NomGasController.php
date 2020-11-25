<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NomGas Controller
 *
 * @property \App\Model\Table\NomGasTable $NomGas
 *
 * @method \App\Model\Entity\NomGa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NomGasController extends AppController
{
    
      public function initialize() {
        parent::initialize();
        $this->Auth->allow(['findNomGas', 'add', 'edit', 'delete']);
    }

    /**
     * findObecCity method
     * for use with JQuery-UI Autocomplete
     *
     * @return JSon query result
     */
    public function findNomGas() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->NomGas->find('all', array(
                'conditions' => array('NomGas.nom LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['nom'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['LieuGas', 'PrixGas'],
        ];
        $nomGas = $this->paginate($this->NomGas);

        $this->set(compact('nomGas'));
    }

    /**
     * View method
     *
     * @param string|null $id Nom Ga id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nomGa = $this->NomGas->get($id, [
            'contain' => ['LieuGas', 'PrixGas', 'RefFuelTypes'],
        ]);

        $this->set('nomGa', $nomGa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nomGa = $this->NomGas->newEntity();
        if ($this->request->is('post')) {
            $nomGa = $this->NomGas->patchEntity($nomGa, $this->request->getData());
            if ($this->NomGas->save($nomGa)) {
                $this->Flash->success(__('The nom ga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nom ga could not be saved. Please, try again.'));
        }
        $lieuGas = $this->NomGas->LieuGas->find('list', ['limit' => 200]);
        $prixGas = $this->NomGas->PrixGas->find('list', ['limit' => 200]);
        $this->set(compact('nomGa', 'lieuGas', 'prixGas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nom Ga id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nomGa = $this->NomGas->get($id, [
            'contain' => ['LieuGas','PrixGas'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nomGa = $this->NomGas->patchEntity($nomGa, $this->request->getData());
            if ($this->NomGas->save($nomGa)) {
                $this->Flash->success(__('The nom ga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nom ga could not be saved. Please, try again.'));
        }
        $lieuGas = $this->NomGas->LieuGas->find('list', ['limit' => 200]);
        $prixGas = $this->NomGas->PrixGas->find('list', ['limit' => 200]);
        $this->set(compact('nomGa', 'lieuGas', 'prixGas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nom Ga id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nomGa = $this->NomGas->get($id);
        if ($this->NomGas->delete($nomGa)) {
            $this->Flash->success(__('The nom ga has been deleted.'));
        } else {
            $this->Flash->error(__('The nom ga could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
