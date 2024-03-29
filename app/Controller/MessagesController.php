<?php
	
	class MessagesController extends AppController {

		public $helpers = array('Html', 'Form');
		
		var $uses = array('User', 'Message');

		public function home() {

			$this->set('profile', $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id')))));

			if ($this->request->is('post')) {
				$imageName = "";
				if(!empty($this->data['User'])){

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

			        $this->User->id = $this->Auth->user('id');

			        $this->request->data['User']['image'] = $imageName;
			        $this->request->data['User']['modified_ip'] = $this->request->clientIp();

			        if ($this->User->save($this->request->data)) {
			            return $this->redirect('/messages/home');
			        }

		        } else if (!empty($this->data['Message'])) {

		        	$contacts = $this->User->find('first', array(
						'conditions' => array('User.name' => $this->request->data['Message']['name'])
					));

					$this->request->data['Message']['to_id'] = $contacts['User']['id'];

			        if(!empty($this->request->data)){

						$this->Message->create();

					    if($this->Message->save($this->request->data)){
					        return $this->redirect(array('action' => 'home'));
					    }
				    }
		        }
		    }


		    //************************************ PAGINATION *******************************************
			$limit = array_key_exists('n', $this->request->query) ? (int) $this->request->query['n'] : 10;

			$this->paginate = array(
				'conditions' => array( 'OR' => array( 'OR' => array('to_id' => $this->Auth->user('id')), array('from_id' => $this->Auth->user('id')))),
   				'fields' => array('DISTINCT from_id', 'to_id', 'content', 'modified'),
   				'order' => 'modified DESC',
   				'group' => array('from_id', 'to_id'),
			    'limit' => $limit
			);

			/**

				SELECT * FROM(
					 	SELECT to_id, from_id, content, modified, ROW_NUMBER() OVER (
					 	partition BY to_id, from_id ORDER BY modified DESC) AS rn 
					 	FROM messages
					) AS dt
				WHERE rn = 1 ORDER BY modified DESC
	
			**/

			$items = $this->paginate($this->Message);

			// some other code

			$this->set(array(
			    'inboxes' => $items,
			    'next_limit' => $limit + 10
			));
	        //******************************************************************************************   			
	
		}

		public function contact(){

			$contacts = $this->User->find('list', array(
				'fields' => array('User.name')
			));

			echo json_encode($contacts);
			exit();
		}

		public function view($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid message'));
			}

			$message = $this->Message->fndiById($id);

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

		public function reply($id){

			if($this->request->is('post')){

				$this->Message->create();
				$this->Message->save($this->request->data);
			}



			$this->set('profile', $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id')))));

			$limit = array_key_exists('n', $this->request->query) ? (int) $this->request->query['n'] : 10;

			$this->paginate = array(
				'conditions' => array(
				    'OR' => array(
				    	'AND' => array(
					        array('to_id' => $this->Auth->user('id')),
					        array('from_id' => $id)),
				        'OR' => array(
				            'AND' => array(
				                array('from_id' => $this->Auth->user('id')),
				                array('to_id' => $id)
				            )
				        )
				    )
				),
   				'fields' => array('from_id', 'to_id', 'content', 'modified'),
   				'order' => 'modified DESC',
			    'limit' => $limit
			);

			$items = $this->paginate($this->Message);

			// some other code

			$this->set(array(
			    'inboxes' => $items,
			    'next_limit' => $limit + 10
			));

		}

	}