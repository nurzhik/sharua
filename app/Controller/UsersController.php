<?php
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController{

	public $uses = array('User', 'Specialist','Register','Car','Questionnaire','Question','Responsible','Result','Home');

	public function beforeFilter(){
		parent::beforeFilter();
		// $this->layout = 'index';
	 	$this->Auth->allow('cabinet');
	 }
	public function admin_index(){
		
		
		$data = $this->User->find('all', array(
			'order' => array('id' => 'desc')
		));
		$this->set(compact('data'));
	}

	public function admin_login(){
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this->Session->setFlash('Неверный логин или пароль.', 'default', array(), 'bad');
	    }
	}

	public function admin_logout(){

		return $this->redirect($this->Auth->logout());
	}
	
	public function forgetpwd($number = null){
		$email = new CakeEmail('smtp');
		if(isset($number) && !empty($number)){
			$user = $this->User->find('first', array(
				'conditions' => array('User.forgetpwd' => $number),
				'recursive' => -1
			));
			
			$user = $user['User'];
			$username = $user['username'];
			unset($user['password']);
			$rand = rand(100000, 999999);

			$email->from(array('info@aritmology.kz' => 'aritmology.kz'))
			->to($username)
			->subject('Сброс пароля');
			$message = "<p>Ваш новый пароль: " . $rand . "</p>";
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');

			$user['password'] = $rand;
			
			// if(empty($user['img']['name']) || !$user['img']['name']){
			// 	unset($user['img']);
			// }
			// $data = array('password' => $rand);
			// debug($user);
			// die;
			if($this->User->save($user) && $email->send($message)){
				$this->Session->setFlash('Новый пароль отправлен Вам на почту', 'default', array(), 'good');
				// debug($data);
				// return $this->redirect("/users/cabinet");
				return $this->redirect("/users/login");
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			// debug($user);

		}

		if($this->request->is(array('post', 'put'))){
			$username = $this->request->data['User']['username'];
			$q = $this->User->find('first', array(
				'conditions' => array('User.username' => $username)
			));
			if(empty($q)){
				$this->Session->setFlash('Данная почта не зарегистрирована', 'default', array(), 'bad');
				return $this->redirect('/users/forgetpwd');
			}else{
				$username = $q['User']['username'];
				
				$forgetpwd = rand(100000, 999999);
				
				// if(empty($q['img']['name']) || !$q['img']['name']){
				// 	unset($q['img']);
				// }
				// $this->data['User']['id'] = $q['User']['id'];
				// $this->data['User']['forgetpwd'] = $forgetpwd;
				// $this->User->save($this->data['User']);
		         $update = $this->User->query("UPDATE users SET forgetpwd='{$forgetpwd}' WHERE username='{$username}'");


		  //       $email->from(array('info@aritmology.kz' => 'Восстановление пароля'))
				// ->to($username)
				// ->subject('Новые письмо с сайта');
				// $message = 'Для восстановления пароля перейдите по ссылке: https://qoiandy.kz/users/forgetpwd/'. $forgetpwd;

				$email->from(array('info@aritmology.kz' => 'aritmology.kz'))
				->to($username)
				->subject('Восстановление пароля');
				$message = "<p>Для восстановления пароля перейдите по ссылке: <a href='https://aritmology.kz/users/forgetpwd/".$forgetpwd ."'>https://aritmology.kz/users/forgetpwd</a></p>";
				$email->viewVars(array('content' => $message));
				$email->template('welcome','default');
				$email->emailFormat('html');

				if($email->send($message)){
					$this->Session->setFlash('На указанный E-mail отправлено письмо', 'default', array(), 'good');
					// debug($data);
					
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				}
		        // $update = $this->User->query("UPDATE users SET password='{$hash}' WHERE username='{$email}'");
		      
			}
			
			
		}
		$this->set(compact('q'));
	}
	
	public function login(){
		if($this->Auth->user()){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			if($this->Auth->user('role') == 'user'){
				return $this->redirect('/'.$lang.'/users/cabinet');
			}elseif($this->Auth->user('role') == 'doctor') {
				return $this->redirect('/'.$lang.'/users/doccabinet');
			}else{
				return $this->redirect('/admin');

			}
		}
		if($this->request->is('post')){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			if($this->Auth->login()){
				if($this->Auth->user('role') == 'user'){
				return $this->redirect('/'.$lang.'/users/cabinet');
			}elseif($this->Auth->user('role') == 'doctor') {
				return $this->redirect('/'.$lang.'/users/doccabinet');
			}
				
			}else{
				$this->Session->setFlash('Ошибка авторизации', 'default', array(), 'bad');
			}
		}
	}

	public function edit($id){
		// if(is_null($id) || !(int)$id || !$this->User->exists($id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$id = $this->Auth->user();
		$data = $this->User->findById($id['id']);
		// if(!$id){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			unset($data1['password']);
			unset($data1['password_repeat']);
			
			if($this->User->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
			$this->set(compact('id', 'data'));
		
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
		}
	}

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}

	public function activation($number = null){
		$this->autoRender = false;
		$lang = $this->Auth->locale = Configure::read('Config.language');
		debug($lang);
		if(isset($number) && !empty($number)){
			$user = $this->User->find('first', array(
				'conditions' => array('User.forgetpwd' => $number),
				'recursive' => -1
			));
			debug($user);
		//	update
			if($number == $user['User']['forgetpwd']){
				$update = $this->User->query("UPDATE users SET activation='activate' WHERE forgetpwd='{$number}'");
				$this->Session->setFlash('Вы успешно активировали аккаунт', 'default', array(), 'good');
				sleep(2);
				debug($update);die;
				return $this->redirect("/users/cabinet");
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				debug('Error 1');die;
				return $this->redirect("/users/login");
			}
			// redirect
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			debug('Error');die;
			return $this->redirect("/".$lang."/users/login");
		}
	}

	public function registration(){
		$this->autoRender = false;
		$emailActivation = new CakeEmail('smtp');
		if($this->request->is('post')){

			$this->User->create();
			$data = $this->request->data['User'];
			//debug($data);die;
			
			$username = $data['username'];
			$check_username = $this->User->find('first', array(
				'conditions' => array('User.username' => $username)
			));
			if(isset($data['img']['name']) && !$data['img']['name']){
			 	unset($data['img']);
			}
			

			// $username = $data['active'][''];
			$rand = rand(100000, 999999);
			$data['forgetpwd']= $rand;
			$data['active'] = 'deactivate';
 			$emailActivation->from(array('st-kotel.kz@yandex.ru' => 'newamanat.113.kz'))
				->to($username)
				->subject('Активация E-mail адреса');
				$messageACtivation = "<p>Для активации  перейдите по ссылке: <a href='https://newamanat.113.kz/users/activation/".$rand."'>https://newamanat.113.kz/users/activation</a></p>";
				$emailActivation->viewVars(array('content' => $messageACtivation));
				$emailActivation->template('welcome','default');
				$emailActivation->emailFormat('html');
			//	debug($data);die;
			if(empty($check_username)  && $emailActivation->send($messageACtivation)){
				// && $email->send($message
				
				if($this->User->save($data)){
					
					$this->Session->setFlash('Вы успешно зарегистрировались! Подтвердите почту, письмо отправлено Вам на почту', 'default', array(), 'good');
					// debug($data);
					$this->Auth->logout();
					return $this->redirect($this->referer());
					//return $this->redirect("/users/cabinet");

				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				}
			}else{
				$this->Session->setFlash('Данный E-mail уже зарегистрирован.', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}
		$title_for_layout = __('Регистрация');
		$this->set(compact('title_for_layout'));
	}
	public function admin_add(){
		if($this->request->is('post')){
			// debug($this->request->data);
			$this->User->create();
			$data = $this->request->data['User'];
			$username = $data['username'];
			$check_username = $this->User->find('first', array(
				'conditions' => array('User.username' => $username)
			));
			if(empty($check_username)){
				if($this->User->save($data)){
					$this->Session->setFlash('Ползователь удачно добавлен.', 'default', array(), 'good');
					// debug($data);
					return $this->redirect("/admin/users");
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
					$this->redirect('/admin/users/add');
				}
			}else{
				$this->Session->setFlash('Данный E-mail уже зарегистрирован.', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
			
		}
		$title_for_layout = 'Добавление пользователя';
		//$category_list = $this->User->Category->find('list');
		
		
		$this->set(compact('title_for_layout'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->User->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->User->findById($id);
		$user_id = $id;
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			unset($data1['password']);
			unset($data1['password_repeat']);
			
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			$data2 = $this->request->data;
			
			if($this->User->save($data1) ){

				foreach($data2 as $key => $v){
					//debug($key);die;
					// $name = $data['name'];
					// $value = $data['value'];
					$selectVar = "SELECT * FROM `users_fields`  WHERE `user_id` = $user_id AND `name`  LIKE '". $key ."'";
					//debug($selectVar);
					$select = $this->User->query($selectVar);
					
					if($select){
						// $this->User->query("UPDATE  users_fields SET `name`  = '". $key ."' , `value` = '". $v . "' WHERE `users_fields`.`user_id` = $user_id  ");
						$eee = "UPDATE  `users_fields` SET `value` = '". $v . "' WHERE `users_fields`.`user_id` = $user_id AND `users_fields`.`name` = '". $key ."' ";
						$this->User->query($eee);
						
						
					}
				}
				$this->Session->setFlash('Операция выполнена успешно!', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$this->set(compact('id', 'data', 'category_list','user_id', 'city_list', 'title_for_layout'));
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование';
			//$category_list = $this->User->Category->find('list');
			
		}
	}

	public function admin_user($id){
		if(is_null($id) || !(int)$id || !$this->User->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->User->findById($id);
		$user_id = $id;
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			unset($data1['password']);
			unset($data1['password_repeat']);
			
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			$data2 = $this->request->data;
			
			if($this->User->save($data1) ){

				foreach($data2 as $key => $v){
					//debug($key);die;
					// $name = $data['name'];
					// $value = $data['value'];
					$selectVar = "SELECT * FROM `users_fields`  WHERE `user_id` = $user_id AND `name`  LIKE '". $key ."'";
					//debug($selectVar);
					$select = $this->User->query($selectVar);
					
					if($select){
						// $this->User->query("UPDATE  users_fields SET `name`  = '". $key ."' , `value` = '". $v . "' WHERE `users_fields`.`user_id` = $user_id  ");
						$eee = "UPDATE  `users_fields` SET `value` = '". $v . "' WHERE `users_fields`.`user_id` = $user_id AND `users_fields`.`name` = '". $key ."' ";
						$this->User->query($eee);
						
						
					}
				}
				$this->Session->setFlash('Операция выполнена успешно!', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$this->set(compact('id', 'data', 'category_list','user_id', 'city_list', 'title_for_layout'));
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование';
			//$category_list = $this->User->Category->find('list');
			
		}
	}

	public function admin_pswedit($id){
		if(is_null($id) || !(int)$id || !$this->User->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->User->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			if(empty($data1['password']) || !$data1['password']){
				unset($data1['password']);
			}
			if(empty($data1['password_repeat']) || !$data1['password_repeat']){
				unset($data1['password_repeat']);
			}
			
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->User->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование пароля';
			//$category_list = $this->User->Category->find('list');
			
			// debug($category_list);
			$this->set(compact('id', 'data',  'city_list', 'title_for_layout'));
		}
	}
	public function admin_peoples(){
		
		
		$data = $this->User->find('all', array(
			'conditions' => array('role' =>'user'  ),
			'order' => array('id' => 'desc')
		));
		$this->set(compact('data'));
	}
	public function admin_peoples_edit($id){
		if(is_null($id) || !(int)$id || !$this->User->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->User->findById($id);
		$user_id = $id;
		$cars = $this->Car->find('all', array(
			'conditions' => array('Car.user_id' =>$id),
		));
		$homes = $this->Home->find('all', array(
			'conditions' => array('Home.user_id' =>$id),
		));
		//debug($cars);die;
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		
		if($this->request->is(array('post', 'put'))){
		
			$data1 = $this->request->data;
			// $data2 = $this->request->data;
			$eee = "UPDATE  `users` SET `active` = '". $data1['active'] . "' WHERE `users`.`id` = $id ";
				
			if($this->User->query($eee)){
				
				$this->Session->setFlash('Операция выполнена успешно!', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		$this->set(compact('id', 'data', 'category_list','user_id', 'specialists', 'title_for_layout','cars','homes'));

		
	}
	public function isActive() {

	}

	public function cabinet(){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		
		$data = $this->Auth->user();
		$id = $data['id'];
		$user_id = $data['id'];
		$data = $this->User->find('first', array(
			'conditions' => array('User.id' => $id)));
		
		//debug($data);die;
		// if( $data['User']['active'] == 'deactivate'){
		// 	$this->Session->setFlash('Активируйте свой логин на почте!!!', 'default', array(), 'good');
			// return $this->redirect('/'.$lang.'/users/cabinet');
		// }

		
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];

			if(empty($data1['password']) || !$data1['password']){
				unset($data1['password']);
				unset($data1['password_repeat']);
				unset($data1['forgetpwd']);
				unset($data1['username']);
			}
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			
			if($this->User->save($data1) ){

				$this->Session->setFlash('Операция выполнена успешно!', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		// if(!$this->request->data){
		// 	$this->request->data = $data;
			
			
		// }
		$title_for_layout = 'Личный кабинет';
		$this->set(compact('id', 'data', 'user_id','title_for_layout', 'member_type'));
	}

	public function cars(){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		
		$data = $this->Auth->user();
		$id = $data['id'];
		$user_id = $data['id'];
		$cars = $this->Car->find('all', array(
			'conditions' => array('Car.user_id' => $id)));
		
	
		
		
	
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'user_id','title_for_layout', 'member_type','cars'));
		}


	}
	public function appartaments(){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		
		$data = $this->Auth->user();
		$id = $data['id'];
		$user_id = $data['id'];
		$homes = $this->Home->find('all', array(
			'conditions' => array('Home.user_id' => $id)));
		
	
		//debug($cars);die;
		
	
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'user_id','title_for_layout', 'member_type','homes'));
		}


	}
	public function my_turn(){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		
		$data = $this->Auth->user();
		$user_id = $data['id'];
		$cars = $this->Car->find('all', array(
			'conditions' => array('Car.user_id' => $user_id )));
		
		foreach ($cars as $car) {
			$id = $car['Car']['order_num'];
			$prevTurn = "SELECT * FROM cars WHERE cars.order_num < $id   ORDER BY id DESC LIMIT 2";	
			$nextTurn = "SELECT * FROM cars WHERE cars.order_num > $id   ORDER BY id ASC LIMIT 2";		
			$selectPrev = $this->User->query($prevTurn);
			$selectNext = $this->User->query($nextTurn);
			asort($selectPrev);

			foreach ($selectPrev as $item) {
				$turns[$car['Car']['id']]['prev'][]=$item;
			}
			$turns[$car['Car']['id']]['middle'][]=$car;
			foreach ($selectNext as $item) {
				$turns[$car['Car']['id']]['next'][]=$item;
			}
			// = $item;
			# code...
		}
		//debug($cars);
		//debug($turns[1]);die;
		//debug($turns);die;
		// $id = $car['Car']['order_num'];
		// $prevElement = $car['Car']['order_num'] - 3;
		// $nextElement = $car['Car']['order_num'] + 3;
		// debug($id);

		// 
		// $nextTurn = "SELECT * FROM cars WHERE cars.order_num > $id   ORDER BY id ASC LIMIT 2";			
		// $selectPrev = $this->User->query($prevTurn);
		// $selectNext = $this->User->query($nextTurn);
		// debug($selectPrev);
	
		//debug($cars);die;
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'user_id','title_for_layout', 'member_type','cars','turns'));
		}


	}
	public function my_turn_appartaments(){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		
		$data = $this->Auth->user();
		$user_id = $data['id'];
		$homes = $this->Home->find('all', array(
			'conditions' => array('Home.user_id' => $user_id )));
		
		foreach ($homes as $home) {
			$id = $home['Home']['order_num'];
			$prevTurn = "SELECT * FROM homes WHERE homes.order_num < $id   ORDER BY id DESC LIMIT 2";	
			$nextTurn = "SELECT * FROM homes WHERE homes.order_num > $id   ORDER BY id ASC LIMIT 2";		
			$selectPrev = $this->User->query($prevTurn);
			$selectNext = $this->User->query($nextTurn);
			asort($selectPrev);

			foreach ($selectPrev as $item) {
				$turns[$home['Home']['id']]['prev'][]=$item;
			}
			$turns[$home['Home']['id']]['middle'][]=$home;
			foreach ($selectNext as $item) {
				$turns[$home['Home']['id']]['next'][]=$item;
			}
			// = $item;
			# code...
		}
		//debug($cars);
		//debug($turns[1]);die;
		//debug($turns);die;
		// $id = $car['Car']['order_num'];
		// $prevElement = $car['Car']['order_num'] - 3;
		// $nextElement = $car['Car']['order_num'] + 3;
		// debug($id);

		// 
		// $nextTurn = "SELECT * FROM cars WHERE cars.order_num > $id   ORDER BY id ASC LIMIT 2";			
		// $selectPrev = $this->User->query($prevTurn);
		// $selectNext = $this->User->query($nextTurn);
		// debug($selectPrev);
	
		//debug($cars);die;
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'user_id','title_for_layout', 'member_type','homes','turns'));
		}


	}
	public function my_questionnaires(){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		
		$data = $this->Auth->user();
		$user_id = $data['id'];
		$questionnaires = $this->Questionnaire->find('all');
		
		
		$moderators =$this->User->find('all',array(
			'conditions'=>array('User.role'=>'moderator'),
		));
		
		// $id = $car['Car']['order_num'];
		// $prevElement = $car['Car']['order_num'] - 3;
		// $nextElement = $car['Car']['order_num'] + 3;
		// debug($id);

		// 
		// $nextTurn = "SELECT * FROM cars WHERE cars.order_num > $id   ORDER BY id ASC LIMIT 2";			
		// $selectPrev = $this->User->query($prevTurn);
		// $selectNext = $this->User->query($nextTurn);
		// debug($selectPrev);
	
		//debug($cars);die;
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'user_id','title_for_layout', 'questionnaires','moderators'));
		}


	}
	public function moderator_questionnaires(){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		
		$data = $this->Auth->user();
		$user_id = $data['id'];
		$check_moderators = $this->Responsible->find('first', array(
			'conditions' => array('Responsible.moderator_id' => $user_id )
		));	
			$questionnaires = $this->Questionnaire->find('all');
		
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'user_id','title_for_layout', 'questionnaires','check_moderators'));
		}


	}
	public function my_question($id){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		$data = $this->Questionnaire->findById($id);
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		$user = $this->Auth->user();
		$user_id = $user['id'];
		$results = $this->Result->find('first',array(
			'conditions' => array(array('Result.questionnaire_id' => $id),array('Result.user_id' => $user_id)),
		));
		
		if(empty($results)){
			$questions = $this->Question->find('all', array(
				'conditions' => array('Question.questionnaire_id' => $id)
			));
			$check_moderators = $this->Responsible->find('first', array(
				'conditions' => array('Responsible.user_id' => $user_id )
			));	
		}
			$results['Result']['results'] = json_decode($results['Result']['results'],true);
		//	debug($results);die;
		// $id = $car['Car']['order_num'];
		// $prevElement = $car['Car']['order_num'] - 3;
		// $nextElement = $car['Car']['order_num'] + 3;
		// debug($id);

		// 
		// $nextTurn = "SELECT * FROM cars WHERE cars.order_num > $id   ORDER BY id ASC LIMIT 2";			
		// $selectPrev = $this->User->query($prevTurn);
		// $selectNext = $this->User->query($nextTurn);
		// debug($selectPrev);
	
		//debug($cars);die;
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'user_id','title_for_layout', 'questions','check_moderators','results'));
		}


	}
	public function moderator_question($id){

		if(!$this->Auth->user() ){
			$lang = $this->Auth->locale = Configure::read('Config.language');
			return $this->redirect('/'.$lang.'/users/login');
		}
		$data = $this->Questionnaire->findById($id);
		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		$user = $this->Auth->user();
		$user_id = $user['id'];
		$results = $this->Result->find('first',array(
			'conditions' => array(array('Result.questionnaire_id' => $id),array('Result.moderator_id' => $user_id)),
		));
		
		if(empty($results)){
			$questions = $this->Question->find('all', array(
				'conditions' => array('Question.questionnaire_id' => $id)
			));
		}
		$results['Result']['results'] = json_decode($results['Result']['results'],true);
		//	debug($results);die;
		// $id = $car['Car']['order_num'];
		// $prevElement = $car['Car']['order_num'] - 3;
		// $nextElement = $car['Car']['order_num'] + 3;
		// debug($id);

		// 
		// $nextTurn = "SELECT * FROM cars WHERE cars.order_num > $id   ORDER BY id ASC LIMIT 2";			
		// $selectPrev = $this->User->query($prevTurn);
		// $selectNext = $this->User->query($nextTurn);
		// debug($selectPrev);
	
		//debug($cars);die;
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Личный кабинет';
			$this->set(compact('id', 'data', 'user_id','title_for_layout', 'questions','check_moderators','results'));
		}


	}
	public function selectmoderator(){
		$this->autoRender = false;
		$data = $this->Auth->user();
		$id = $data['id'];
		$moderator_id= $this->request->data['Moderator']['id'];
		// $emailActivation = new CakeEmail('smtp');
		$morderator = $this->User->findById($moderator_id);	
		$moderator_name= $morderator['User']['fio'];
		
		$check_moderators = $this->Responsible->find('first', array(
			'conditions' => array('Responsible.user_id' => $id )
		));	

		if(!$check_moderators){
			$q = "INSERT INTO responsibles (user_id,moderator_id,moderator_fio) VALUES ('".$id."' ,  '".$moderator_id."',  '".$moderator_name."')";
		}else{
			$q = "UPDATE responsibles SET moderator_id='{$moderator_id}',moderator_fio='{$moderator_name}' WHERE user_id='{$id}'";
		}
		
		$this->User->query($q);
					
		$this->Session->setFlash('Сохранено', 'default', array(), 'good');

		return $this->redirect($this->referer());	
		
		
		$title_for_layout = __('Активация');
		$this->set(compact('title_for_layout'));
	}
	public function questionnairesend(){
		$this->autoRender = false;
		$user = $this->Auth->user();
		$user_id = $user['id'];
		$data= $this->request->data['Question'];
		
		$results = json_encode($data['results'],JSON_UNESCAPED_UNICODE);

		$questionnaire_id= $data['questionnaire_id'];
		$q = "INSERT INTO results (user_id,results,questionnaire_id) VALUES ('".$user_id."' ,  '".$results."' ,  '".$questionnaire_id."')";
		$this->User->query($q);
		$this->Session->setFlash('Сохранено', 'default', array(), 'good');

		return $this->redirect($this->referer());	
	}
	public function modeartoresend(){
		$this->autoRender = false;
		$user = $this->Auth->user();
		$user_id = $user['id'];
		
		$data = $this->request->data['Question'];
		$responsibles =$this->Responsible->find('all', array(
			'conditions' => array('Responsible.moderator_id' => $user_id )
		));	

		//	debug($responsibles);die;
		$results = json_encode($data['results'],JSON_UNESCAPED_UNICODE);

		$questionnaire_id= $data['questionnaire_id'];
		foreach ($responsibles as $item) {
			$q = "INSERT INTO results (user_id,results,questionnaire_id,moderator_id,moderator_fio) VALUES ('".$item['Responsible']['user_id']."' ,  '".$results."' ,  '".$questionnaire_id."' ,  '".$item['Responsible']['moderator_id']."',  '".$item['Responsible']['moderator_fio']."')";
			$this->User->query($q);
		}
		
		
		$this->Session->setFlash('Сохранено', 'default', array(), 'good');

		return $this->redirect($this->referer());	
	}
	public function send_activation_email(){
		$this->autoRender = false;
		$data = $this->Auth->user();
		$id = $data['id'];

		$emailActivation = new CakeEmail('smtp');
		

			
		// debug($data);die;
		$username = $data['username'];
		$check_username = $this->User->find('first', array(
			'conditions' => array('User.username' => $username)
		));
	
		$rand = rand(100000, 999999);
		$update = $this->User->query("UPDATE users SET forgetpwd='{$rand}' WHERE username='{$username}'");

		// $data['forgetpwd']= $rand;
		
		$emailActivation->from(array('info@aritmology.kz' => 'aritmology.kz'))
		->to($username)
		->subject('Активация почты');
		$messageACtivation = "<p>Для активации перейдите по ссылке: <a href='https://newamanat.113.kz/users/activation/".$rand."'>https://newamanat.113/users/activation</a></p>";
		$emailActivation->viewVars(array('content' => $messageACtivation));
		$emailActivation->template('welcome','default');
		$emailActivation->emailFormat('html');

		if( $emailActivation->send($messageACtivation)){
			// $this->Session->setFlash('Письмо успешно отправлено на вашу почту', 'default', array(), 'good');
			echo 'Письмо успешно отправлено на вашу почту, активируйте его';
			echo "<br>";
			echo "<a href='/users/cabinet'>Перейти на сайт</a>";
			
			// return $this->redirect('/');
		}else{
			$this->Session->setFlash('Ошибка при активации.', 'default', array(), 'bad');
			// return $this->redirect($this->referer());
		}
		
		$title_for_layout = __('Активация');
		$this->set(compact('title_for_layout'));
	}

}