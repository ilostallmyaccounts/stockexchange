<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groupes Controller
 *
 * @property \App\Model\Table\GroupesTable $Groupes
 *
 * @method \App\Model\Entity\Groupe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $groupes = $this->paginate($this->Groupes);

        $this->set(compact('groupes'));
    }

    /**
     * View method
     *
     * @param string|null $id Groupe id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $groupe = $this->Groupes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('groupe', $groupe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $groupe = $this->Groupes->newEntity();
        if ($this->request->is('post')) {
            $groupe = $this->Groupes->patchEntity($groupe, $this->request->getData());
            if ($this->Groupes->save($groupe)) {
                $this->Flash->success(__('The groupe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The groupe could not be saved. Please, try again.'));
        }
        $users = $this->Groupes->Users->find('list', ['limit' => 200]);
        $this->set(compact('groupe', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Groupe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $groupe = $this->Groupes->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groupe = $this->Groupes->patchEntity($groupe, $this->request->getData());
            if ($this->Groupes->save($groupe)) {
                $this->Flash->success(__('The groupe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The groupe could not be saved. Please, try again.'));
        }
        $users = $this->Groupes->Users->find('list', ['limit' => 200]);
        $this->set(compact('groupe', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Groupe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $groupe = $this->Groupes->get($id);
        if ($this->Groupes->delete($groupe)) {
            $this->Flash->success(__('The groupe has been deleted.'));
        } else {
            $this->Flash->error(__('The groupe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
