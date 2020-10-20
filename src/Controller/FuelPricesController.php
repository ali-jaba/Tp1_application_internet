<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FuelPrices Controller
 *
 * @property \App\Model\Table\FuelPricesTable $FuelPrices
 *
 * @method \App\Model\Entity\FuelPrice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuelPricesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $fuelPrices = $this->paginate($this->FuelPrices);

        $this->set(compact('fuelPrices'));
    }

    /**
     * View method
     *
     * @param string|null $id Fuel Price id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fuelPrice = $this->FuelPrices->get($id, [
            'contain' => [],
        ]);

        $this->set('fuelPrice', $fuelPrice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fuelPrice = $this->FuelPrices->newEntity();
        if ($this->request->is('post')) {
            $fuelPrice = $this->FuelPrices->patchEntity($fuelPrice, $this->request->getData());
            if ($this->FuelPrices->save($fuelPrice)) {
                $this->Flash->success(__('The fuel price has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fuel price could not be saved. Please, try again.'));
        }
        $this->set(compact('fuelPrice'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fuel Price id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fuelPrice = $this->FuelPrices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fuelPrice = $this->FuelPrices->patchEntity($fuelPrice, $this->request->getData());
            if ($this->FuelPrices->save($fuelPrice)) {
                $this->Flash->success(__('The fuel price has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fuel price could not be saved. Please, try again.'));
        }
        $this->set(compact('fuelPrice'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fuel Price id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fuelPrice = $this->FuelPrices->get($id);
        if ($this->FuelPrices->delete($fuelPrice)) {
            $this->Flash->success(__('The fuel price has been deleted.'));
        } else {
            $this->Flash->error(__('The fuel price could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
