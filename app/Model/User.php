<?php 

	App::uses('AppModel', 'Model');
	App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

	class User extends AppModel {


		public $validate = array(
			'name' => array(
				'required' => array(
	                'rule' => 'notBlank',
	                'message' => 'A name is required'
				),
				'between' => array(
					'rule' => array('lengthBetween', 5, 20),
					'message' => 'Between 5 to 20 characters'
				)
			),
			'email' => array(
				'email' => array(
					'rule' => array('email', true),
					'message' => 'Please supply a valid email address.'
				),
				'isUnique' => array(
					'rule' => 'isUnique',
					'message' => 'This email has already been taken'
				)
			),
			'password' => array(
				'notEmpty' => array(
					'rule' => array('minLength', 8),
					'message' => 'Minimum length is 8'
				),
			),
			'password2' => array(
				'required' => array(
					'rule' => 'notBlank',
					'message' => 'A password is required'
				),
				'matchPasswords' => array(
					'rule' => array('matchPasswords'),
					'message' => 'Your passwords do not match!'
				)
			)


		);

		public function beforeSave($options = array()) {
		    if (isset($this->data[$this->alias]['password'])) {
		        $passwordHasher = new BlowfishPasswordHasher();
		        $this->data[$this->alias]['password'] = $passwordHasher->hash(
		            $this->data[$this->alias]['password']
		        );
		    }
		    return true;
		}

		public function matchPasswords(){
		    if ($this->data['User']['password'] !== $this->data['User']['password2']){
            return false;       
	        }
	        return true;
		}
	}