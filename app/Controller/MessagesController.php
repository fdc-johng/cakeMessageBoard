<?php
	
	class MessagesController extends AppController {

		public $helpers = array('Html', 'Form');
		
		var $uses = array('User');

		public function home() {
			if ($this->request->is('post')) {

				$imageName = "";

				if(!empty($this->data['User']['image']))
                {
                    $file = $this->data['User']['image']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext))
                    {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\\' . $this->Auth->user('id') . ".jpg");

                        $imageName = strval($this->Auth->user('id')) . ".jpg";
                    } 
                }

		        // If the form data can be validated and saved..
		        $this->User->id = $this->Auth->user('id');

		        $this->request->data['User']['image'] = $imageName;

		        if ($this->User->save($this->request->data)) {
		            // Set a session flash message and redirect.
		            return $this->redirect('/messages/home');
		        }

		        
		    }

		    // If no form data, find the recipe to be edited
		    // and hand it to the view.
		    $this->set('user', $this->User->findById($this->Auth->user('id')));

			$this->set('profile', $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id')))));
		}

		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid message'));
			}

			$message = $this->Message->findById($id);

			if(!$message) {
				throw new NotFoundException(__('Invalid message'));
			}

			$this->set('message', $message);
		}

		public function logout() {
			return $this->redirect($this->Auth->logout());
		}

		public function messages() {

		}

	}