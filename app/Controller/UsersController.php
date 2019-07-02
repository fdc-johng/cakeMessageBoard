<?php 

	class UsersController extends AppController
	{
		public function index()
		{

		}

		public function register()
		{
			if($this->request->is('post')){
				$this->User->create();
				if($this->User->save($this->request->data)){
					return $this->redirect(array('action' => 'registersuccess'));
				}
			}
		}

		public function beforeFilter(){

		}

		public function logout() {

		}

		public function registersuccess(){

		}
	}