<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersProducts Controller
 *
 * @property \App\Model\Table\UsersProductsTable $UsersProducts
 *
 * @method \App\Model\Entity\UsersProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products']
        ];
        $usersProducts = $this->paginate($this->UsersProducts);

        $this->set(compact('usersProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersProduct = $this->UsersProducts->get($id, [
            'contain' => ['Users', 'Products']
        ]);

        $this->set('usersProduct', $usersProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersProduct = $this->UsersProducts->newEntity();
        if ($this->request->is('post')) {
            $usersProduct = $this->UsersProducts->patchEntity($usersProduct, $this->request->getData());
            if ($this->UsersProducts->save($usersProduct)) {
                $this->Flash->success(__('The users product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users product could not be saved. Please, try again.'));
        }
        $users = $this->UsersProducts->Users->find('list', ['limit' => 200]);
        $products = $this->UsersProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('usersProduct', 'users', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersProduct = $this->UsersProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersProduct = $this->UsersProducts->patchEntity($usersProduct, $this->request->getData());
            if ($this->UsersProducts->save($usersProduct)) {
                $this->Flash->success(__('The users product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users product could not be saved. Please, try again.'));
        }
        $users = $this->UsersProducts->Users->find('list', ['limit' => 200]);
        $products = $this->UsersProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('usersProduct', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersProduct = $this->UsersProducts->get($id);
        if ($this->UsersProducts->delete($usersProduct)) {
            $this->Flash->success(__('The users product has been deleted.'));
        } else {
            $this->Flash->error(__('The users product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
