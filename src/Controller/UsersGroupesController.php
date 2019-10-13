<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersGroupes Controller
 *
 * @property \App\Model\Table\UsersGroupesTable $UsersGroupes
 *
 * @method \App\Model\Entity\UsersGroupe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersGroupesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Groupes']
        ];
        $usersGroupes = $this->paginate($this->UsersGroupes);

        $this->set(compact('usersGroupes'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Groupe id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersGroupe = $this->UsersGroupes->get($id, [
            'contain' => ['Users', 'Groupes']
        ]);

        $this->set('usersGroupe', $usersGroupe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersGroupe = $this->UsersGroupes->newEntity();
        if ($this->request->is('post')) {
            $usersGroupe = $this->UsersGroupes->patchEntity($usersGroupe, $this->request->getData());
            if ($this->UsersGroupes->save($usersGroupe)) {
                $this->Flash->success(__('The users groupe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users groupe could not be saved. Please, try again.'));
        }
        $users = $this->UsersGroupes->Users->find('list', ['limit' => 200]);
        $groupes = $this->UsersGroupes->Groupes->find('list', ['limit' => 200]);
        $this->set(compact('usersGroupe', 'users', 'groupes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Groupe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersGroupe = $this->UsersGroupes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersGroupe = $this->UsersGroupes->patchEntity($usersGroupe, $this->request->getData());
            if ($this->UsersGroupes->save($usersGroupe)) {
                $this->Flash->success(__('The users groupe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users groupe could not be saved. Please, try again.'));
        }
        $users = $this->UsersGroupes->Users->find('list', ['limit' => 200]);
        $groupes = $this->UsersGroupes->Groupes->find('list', ['limit' => 200]);
        $this->set(compact('usersGroupe', 'users', 'groupes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Groupe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersGroupe = $this->UsersGroupes->get($id);
        if ($this->UsersGroupes->delete($usersGroupe)) {
            $this->Flash->success(__('The users groupe has been deleted.'));
        } else {
            $this->Flash->error(__('The users groupe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
