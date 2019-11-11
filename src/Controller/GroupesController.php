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
        $this->paginate = [
            'contain' => ['Files']
        ];
        $groupes = $this->paginate($this->Groupes);

        $this->set(compact('groupes'));
    }

    /**
     * findCar method
     * for use with JQuery-UI Autocomplete
     *
     * @return JSon query result
     */
    public function findGroupe() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Groupes->find('all', array(
                'conditions' => array('Groupes.groupname LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['groupname']);
            }
            echo json_encode($resultArr);
        }
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
            'contain' => ['Files', 'Users']
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
        $files = $this->Groupes->Files->find('list', ['limit' => 200]);
        $users = $this->Groupes->Users->find('list', ['limit' => 200]);
        $this->set(compact('groupe', 'files', 'users'));
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
        $files = $this->Groupes->Files->find('list', ['limit' => 200]);
        $users = $this->Groupes->Users->find('list', ['limit' => 200]);
        $this->set(compact('groupe', 'files', 'users'));
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
