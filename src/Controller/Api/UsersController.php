<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
//use Cake\Utility\Security;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'token', 'changepw']);
    }
	
	
    public function changepw()
    {
		
		$userId =
			JWT::decode(
				substr($this->request->header('Authorization'), 7),
				Security::salt(),
				array('HS256')
			)->sub;
		
		$user = $this->Users->get($userId);
		$user->password = $this->request->data['password'];
		if($this->Users->save($user)){
			die('{"message":"Password changed successfully"}');
		} else {
			throw new \Exception("Could not change password");
		}
    }
	
	public function add()
	{
		$this->Crud->on('afterSave', function(Event $event) {
			if ($event->subject->created) {
				$this->set('data', [
					'id' => $event->subject->entity->id,
					'token' => JWT::encode(
						[
							'sub' => $event->subject->entity->id,
							'exp' =>  time() + 604800
						],
					Security::salt())
				]);
				$this->Crud->action()->config('serialize.data', 'data');
			}
		});
		return $this->Crud->execute();
	}
	
	public function token()
	{
		/*ob_start();
        $email = $this->request->data('email');
        $pwd = $this->request->data('password');
        $user = $this->Users->find()->where(['email' => $email, 'password' => $pwd])->first();
		$user = $this->Users->find()->where(['email' => $email])->first();
		print_r($user);
		die(ob_get_clean());*/
		$user = $this->Auth->identify();
		if (!$user) {
			throw new UnauthorizedException('Invalid username or password');
		}

		$this->set([
			'success' => true,
			'data' => [
				'token' => JWT::encode([
					'sub' => $user['id'],
					'exp' =>  time() + 604800
				],
				Security::salt())
			],
			'_serialize' => ['success', 'data']
		]);
	}
}