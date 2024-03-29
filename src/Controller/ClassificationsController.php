<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Classifications Controller
 *
 * @property \App\Model\Table\ClassificationsTable $Classifications
 *
 * @method \App\Model\Entity\Classification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassificationsController extends AppController
{
	   public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'name'
        ],
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $classifications = $this->paginate($this->Classifications);

        $this->set(compact('classifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Classification id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function view($id = null)
    {
        $classification = $this->Classifications->get($id, [
            'contain' => []
        ]);

        $this->set('classification', $classification);
    }*/

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $classification = $this->Classifications->newEntity();
        if ($this->request->is('post')) {
            $classification = $this->Classifications->patchEntity($classification, $this->request->getData());
            if ($this->Classifications->save($classification)) {
                $this->Flash->success(__('The classification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classification could not be saved. Please, try again.'));
        }
        $this->set(compact('classification'));
    }*/

    /**
     * Edit method
     *
     * @param string|null $id Classification id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $classification = $this->Classifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classification = $this->Classifications->patchEntity($classification, $this->request->getData());
            if ($this->Classifications->save($classification)) {
                $this->Flash->success(__('The classification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classification could not be saved. Please, try again.'));
        }
        $this->set(compact('classification'));
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Classification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classification = $this->Classifications->get($id);
        if ($this->Classifications->delete($classification)) {
            $this->Flash->success(__('The classification has been deleted.'));
        } else {
            $this->Flash->error(__('The classification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
	
    public function getClassifications() {
        $this->autoRender = false; // avoid to render view

        $classifications = $this->Classifications->find('all', [
            'contain' => ['Types'],
        ]);

        $classificationsJ = json_encode($classifications);
        $this->response->type('json');
        $this->response->body($classificationsJ);

    }
}
