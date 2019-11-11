<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
	public function initialize(){
        parent::initialize();

        // Include the FlashComponent
        $this->loadComponent('Flash');

        // Load Files model
        $this->loadModel('Files');

        // Set the layout
        //$this->layout = 'frontend';
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Types']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Types', 'Users', 'Orderlines',]
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
			$product->user_id = $this->Auth->user('id');
            $product = $this->Products->patchEntity($product, $this->request->getData(), [
				'accessibleFields' => ['user_id' => false]
			]);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        // Bâtir la liste des catégories  
        $this->loadModel('Classifications');
        $classifications = $this->Classifications->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $classifications = $classifications->toArray();
        reset($classifications);
        $classification_id = key($classifications);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $types = $this->Products->Types->find('list', [
            'conditions' => ['Types.classification_id' => $classification_id],
        ]);
		
        //$types = $this->Products->Types->find('list', ['limit' => 200]);
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'types', 'users', 'classifications'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        // Bâtir la liste des catégories  
        $this->loadModel('Classifications');
        $classifications = $this->Classifications->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $classifications = $classifications->toArray();
        reset($classifications);
        $classification_id = key($classifications);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $types = $this->Products->Types->find('list', [
            'conditions' => ['Types.classification_id' => $classification_id],
        ]);
		
        $types = $this->Products->Types->find('list', ['limit' => 200]);
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'types', 'users', 'classifications'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function isAuthorized($user)
       {
               $action = $this->request->getParam('action');
               if (in_array($action, ['add'])) {
                       return true;
               }

               $id = $this->request->getParam('pass.0');
               if (!$id) {
                       return false;
               }

               $product = $this->Products->get($id);

               return $product->user_id === $user['id'] || $user['isadmin'] === true;
    }
	
    public function getByClassification() {
        $classification_id = $this->request->query('classification_id');

        $types = $this->Types->find('all', [
            'conditions' => ['Types.classification_id' => $classification_id],
        ]);
        $this->set('types', $types);
        $this->set('_serialize', ['types']);
		return "eee";
    }
}
