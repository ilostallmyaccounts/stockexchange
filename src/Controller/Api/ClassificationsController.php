<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class ClassificationsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 15,
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
		//if ($this->request->data('action_type') == "index") echo "INDEX LOOOOOOL";
				//die("eee " . $this->request->data('action_type') . $this->request->data('id'));
        $classifications = $this->paginate($this->Classifications);

        $this->set(compact('classifications'));
		
		$id = $this->request->data('id');
		$action = $this->request->data('action_type');
		
		if ($action) {
			if ($action == "edit") {
				$this->edit($id);
			} elseif ($action == "delete") {
				$this->delete($id);
			} elseif ($action == "add") {
				$this->add();
			} elseif ($action == "view") {
				//die("eee");
				$this->view($id);
			} elseif ($action == "index") {
				//require_once("../../Template/Classifications/index.ctp");
				ob_start();
				foreach ($classifications as $classification) { ?>
                <tr>
                    <td><?= $classification->id ?></td>
                    <td><?= $classification->name ?></td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-warning" rowid="<?= $classification->id; ?>" data-type="edit" data-toggle="modal" data-target="#modalClassificationAddEdit">edit</a>
                        <a href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?classificationAction('delete', '<?= $classification->id; ?>'):false;">delete</a>
                    </td>
                </tr>
				<?php }
				die(/*json_encode(['html' => */ob_get_clean()/*])*/);
			}
		}
    }

    /**
     * View method
     *
     * @param string|null $id Classification id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		//if ($this->request->data('action_type') == "index") echo "VIEW LOOOOOOL";
		//die("view " . $this->request->data('action_type') . $this->request->data('id'));
        $classification = $this->Classifications->get($id, [
            'contain' => []
        ]);

        $this->set('classification', $classification);
		
		die(json_encode($classification));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		//if ($this->request->data('action_type') == "index") echo "ADD LOOOOOOL";
		//die("add " . $this->request->data('action_type') . $this->request->data('id'));
		if ($this->request->data('action_type') != 'add') {
			$this->index();
		} else {
			$classification = $this->Classifications->newEntity();
			if ($this->request->is('post')) {
				$classification = $this->Classifications->patchEntity($classification, $this->request->getData());
				if ($this->Classifications->save($classification)) {
					//$this->Flash->success(__('The classification has been saved.'));

					//return $this->redirect(['action' => 'index']);
				}
				//$this->Flash->error(__('The classification could not be saved. Please, try again.'));
			}
		}
        //$this->set(compact('classification'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classification id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		//if ($this->request->data('action_type') == "index") echo "EDIT LOOOOOOL";
		//die("edit " . $this->request->data('action_type') . $this->request->data('id'));
		if ($this->request->data('action_type') != 'edit') {
			$this->index();
		} else {
			$classification = $this->Classifications->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$classification = $this->Classifications->patchEntity($classification, $this->request->getData());
				if ($this->Classifications->save($classification)) {
					//$this->Flash->success(__('The classification has been saved.'));

					//return $this->redirect(['action' => 'index']);
				}
				//$this->Flash->error(__('The classification could not be saved. Please, try again.'));
			}
		}
        //$this->set(compact('classification'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Classification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		//if ($this->request->data('action_type') == "index") echo "DELETE LOOOOOOL";
		//die("delete " . $this->request->data('action_type') . ','. $this->request->data('id'));
		if ($this->request->data('action_type') != 'delete') {
			$this->index();
		} else {
			$this->request->allowMethod(['post', 'delete']);
			$classification = $this->Classifications->get($id);
			if ($this->Classifications->delete($classification)) {
				die("yay");
				//$this->Flash->success(__('The classification has been deleted.'));
			} else {
				die("nay");
				//$this->Flash->error(__('The classification could not be deleted. Please, try again.'));
			}
		}

        //return $this->redirect(['action' => 'index']);
    }
	
	public function beforeRender($event)
	{
		$this->RequestHandler->renderAs($this, 'json');
		$this->response->type('application/json');
		$this->set('_serialize', true);
	}
}