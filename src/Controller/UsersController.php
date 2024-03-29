<?php
namespace App\Controller;

use Cake\I18n\I18n;
use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['logout', 'add']);
	}
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Products', 'Groupes', 'Orders']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			$text = Text::uuid();
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$user->validation = $text;
			$user->admin = false;
            if ($this->Users->save($user)) {
				$email = new Email('default');
				$email->to($user['email'])->from('stockexchange@localhost')->subject(__('Confirm email'))->send(__('Please confirm your email') . "\r\n\r\n http://localhost/stockexchange/users/valider/" . $user['id'] . '.' . $text);
                $this->Flash->success(__('The user has been saved.').' '.__('Please validate your email.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $products = $this->Users->Products->find('list', ['limit' => 200]);
        $groupes = $this->Users->Groupes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'products', 'groupes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Products', 'Groupes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $products = $this->Users->Products->find('list', ['limit' => 200]);
        $groupes = $this->Users->Groupes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'products', 'groupes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
		}
	}
	
	
	public function logout()
	{
		$this->Flash->success(__('Vous avez été déconnecté.'));
		return $this->redirect($this->Auth->logout());
	}
	
	public function setFR()
	{
		I18n::setLocale('fr_FR');
		$this->request->getSession()->write('Config.language', 'fr_FR');
	}
	
	public function setEN()
	{
		I18n::setLocale('en_US');
		$this->request->getSession()->write('Config.language', 'en_US');
	}
	
	public function setDE()
	{
		I18n::setLocale('de_DE');
		$this->request->getSession()->write('Config.language', 'de_DE');
	}
	
	public function valider($id = null){
		$params = explode('.', $id);
		$userId = $params[0];
		$validKey = $params[1];
		
		
		$user = $this->Users->get(intval($userId));
		if ($user['validation'] == $validKey) {
			$user['isadmin'] = true;
			$user['validation'] = '';
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));
				return;
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$this->Flash->error(__('The validation token is invalid.'));
	}
}
