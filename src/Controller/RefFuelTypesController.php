<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * RefFuelTypes Controller
 *
 * @property \App\Model\Table\RefFuelTypesTable $RefFuelTypes
 *
 * @method \App\Model\Entity\RefFuelType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefFuelTypesController extends AppController {

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
// The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'edit', 'delete'])) {
            return true;
        }

// All other actions require a slug.
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

// Check that the article belongs to the current user.
        $refFuelTypes = $this->RefFuelTypes->findBySlug($slug)->first();

        return $refFuelTypes->user_id === $user['id'];
    }
    
    public function initialize(){
        parent::initialize();

        // Include the FlashComponent
        $this->loadComponent('Flash');

        // Load Files model
        $this->loadModel('Files');

        // Set the layout
   //     $this->layout = 'frontend';
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $refFuelTypes = $this->paginate($this->RefFuelTypes);

        $this->set(compact('refFuelTypes'));


      
        $uploadData = '';
        if ($this->request->is('post')) {
            if (!empty($this->request->data['file']['name'])) {
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'files/add/';
                $uploadFile = $uploadPath . $fileName;
                if (move_uploaded_file($this->request->data['file']['tmp_name'], 'img/' . $uploadFile)) {
                    $uploadData = $this->Files->newEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");
                    if ($this->Files->save($uploadData)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            } else {
                $this->Flash->error(__('Please choose a file to upload.'));
            }
        }
        $this->set('uploadData', $uploadData);

        $files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files', $files);
        $this->set('filesRowNum', $filesRowNum);
    
        
    }

    /**
     * View method
     *
     * @param string|null $id Ref Fuel Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $refFuelType = $this->RefFuelTypes->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('refFuelType', $refFuelType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $refFuelType = $this->RefFuelTypes->newEntity();
        if ($this->request->is('post')) {
            $refFuelType = $this->RefFuelTypes->patchEntity($refFuelType, $this->request->getData());
            $refFuelType->user_id = $this->Auth->user('id');
            if ($this->RefFuelTypes->save($refFuelType)) {
                $this->Flash->success(__('The ref fuel type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref fuel type could not be saved. Please, try again.'));
        }
        $users = $this->RefFuelTypes->Users->find('list', ['limit' => 200]);
        $this->set(compact('refFuelType', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ref Fuel Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $refFuelType = $this->RefFuelTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refFuelType = $this->RefFuelTypes->patchEntity($refFuelType, $this->request->getData(), ['accessibleFields' => ['user_id' => false]]);

            if ($this->RefFuelTypes->save($refFuelType)) {
                $this->Flash->success(__('The ref fuel type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref fuel type could not be saved. Please, try again.'));
        }
        $users = $this->RefFuelTypes->Users->find('list', ['limit' => 200]);
        $this->set(compact('refFuelType', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ref Fuel Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $refFuelType = $this->RefFuelTypes->get($id);
        if ($this->RefFuelTypes->delete($refFuelType)) {
            $this->Flash->success(__('The ref fuel type has been deleted.'));
        } else {
            $this->Flash->error(__('The ref fuel type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
