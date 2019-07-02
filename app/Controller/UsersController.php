<?php 

	class UsersController extends AppController
	{
		public function index()
		{
			 if ($this->request->is('post')) {
		        if ($this->Auth->login()) {
		            return $this->redirect($this->Auth->redirectUrl());
		        }
		        $this->Flash->error(__('Invalid username or password, try again'));
		    }
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

		public function logout() {
			return $this->redirect($this->Auth->logout());
		}

		public function registersuccess(){

		}
	}