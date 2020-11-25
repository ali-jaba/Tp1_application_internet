<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * LieuGas Controller
 *
 * @property \App\Model\Table\LieuGasTable $LieuGas
 *
 * @method \App\Model\Entity\KrajRegion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LieuGasController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $lieuGas = $this->LieuGas->find('all');
        $this->set([
            'lieuGas' => $lieuGas,
            '_serialize' => ['lieuGas']
        ]);
    }

    public function view($id)
    {
        $lieuGa = $this->LieuGas->get($id);
        $this->set([
            'lieuGa' => $lieuGa,
            '_serialize' => ['lieuGa']
        ]);
    }
    
    

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $lieuGa = $this->LieuGas->newEntity($this->request->getData());
        if ($this->LieuGas->save($lieuGa)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'lieuGa' => $lieuGa,
            '_serialize' => ['message', 'lieuGa']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $lieuGa = $this->LieuGas->get($id);
        $lieuGa = $this->LieuGas->patchEntity($lieuGa, $this->request->getData());
        if ($this->LieuGas->save($lieuGa)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $lieuGa = $this->LieuGas->get($id);
        $message = 'Deleted';
        if (!$this->LieuGas->delete($lieuGa)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }


}
