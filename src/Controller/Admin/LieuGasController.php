<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * LieuGas Controller
 *
 * @property \App\Model\Table\LieuGasTable $LieuGas
 *
 * @method \App\Model\Entity\LieuGa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LieuGasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $lieuGas = $this->paginate($this->LieuGas);

        $this->set(compact('lieuGas'));
    }

    /**
     * View method
     *
     * @param string|null $id Lieu Ga id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lieuGa = $this->LieuGas->get($id, [
            'contain' => ['NomGas', 'PrixGas'],
        ]);

        $this->set('lieuGa', $lieuGa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lieuGa = $this->LieuGas->newEntity();
        if ($this->request->is('post')) {
            $lieuGa = $this->LieuGas->patchEntity($lieuGa, $this->request->getData());
            if ($this->LieuGas->save($lieuGa)) {
                $this->Flash->success(__('The lieu ga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lieu ga could not be saved. Please, try again.'));
        }
        $this->set(compact('lieuGa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lieu Ga id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lieuGa = $this->LieuGas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lieuGa = $this->LieuGas->patchEntity($lieuGa, $this->request->getData());
            if ($this->LieuGas->save($lieuGa)) {
                $this->Flash->success(__('The lieu ga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lieu ga could not be saved. Please, try again.'));
        }
        $this->set(compact('lieuGa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lieu Ga id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lieuGa = $this->LieuGas->get($id);
        if ($this->LieuGas->delete($lieuGa)) {
            $this->Flash->success(__('The lieu ga has been deleted.'));
        } else {
            $this->Flash->error(__('The lieu ga could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
