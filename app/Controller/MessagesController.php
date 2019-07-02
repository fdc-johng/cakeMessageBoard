<?php
	
	class MessagesController extends AppController {

		public $helpers = array('Html', 'Form');

		public function home() {
			$this->set('messages', $this->Message->find('all'));
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

	}