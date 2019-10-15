<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Mailer\Email;
   use Cake\Utility\Text;

   class EmailsController extends AppController{
      public function index(){
         $email = new Email('default');
         $email->to('stockexchange@localhost')->from('stockexchange@localhost')->subject(__('Confirm email'))->send(__('Please confirm your email') . '<br /><br />http://localhost/stockexchange/emails/valider/' . Text::uuid());
      }
	  public function valider($id = null){
		  die($id);
	  }
	  public function isAuthorized($user) {
		  return true;
	  }
   }
?>