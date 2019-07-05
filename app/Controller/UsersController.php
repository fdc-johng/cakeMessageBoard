<?php 

	class UsersController extends AppController
	{

		public function index(){
			return $this->redirect($this->Auth->logout());
		}

		public function login()
		{
			 if ($this->request->is('post')) {
		        if ($this->Auth->login()) {
		        	$this->User->id = $this->Auth->user('id');
		        	$this->request->data['User']['last_login_time'] = date("Y-m-d H:i:s");
		        	$this->User->save($this->request->data);
		            return $this->redirect($this->Auth->redirectUrl());
		        }
		        $this->Flash->error(__('Invalid email or password, try again'));
		    }
		}

		public function register()
		{
			if($this->request->is('post')){
				$this->User->create();
				$this->request->data['User']['created_ip'] = $this->request->clientIp();
				$this->request->data['User']['modified_ip'] = $this->request->clientIp();
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