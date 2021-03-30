<?php

class QuestionnairesController  extends AppController{
	public $uses = array('Category', 'Questionnaire','Question','Result','Responsible');
	public function admin_index(){

		$data = $this->Questionnaire->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		
		if($this->request->is('post')){
			$this->Questionnaire->create();

			
			$data = $this->request->data['Questionnaire'];
		
			
			if($this->Questionnaire->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		// $data1 = $this->Questionnaire->find('all');
	
		// foreach ($data1 as $key => $value ) {
		// 	$data1[$key]['Questionnaire']['title_ru'] = json_decode($value['Questionnaire']['title_ru'],true );;
		// }
		//debug($data1);die;
		//$data['Questionnaire']['title_ru']= $peoples;
		
		$this->set(compact('id','data1'));
	}
	public function admin_addquestion(){
		$this->autoRender = false;
		if($this->request->is('post')){

			$data = $this->request->data['Question'];
			
		
			if($this->Question->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_editquestion(){
		$this->autoRender = false;
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['Question'];
			$this->Question->id = $data['id'];
			
			$data1 = $this->request->data['Question'];
		
			if($this->Question->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		$all = $this->Questionnaire->find('all');
		//debug($all);die;
		if(is_null($id) || !(int)$id || !$this->Questionnaire->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Questionnaire->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->Questionnaire->id = $id;
			$data1 = $this->request->data['Questionnaire'];
			
			
			if($this->Questionnaire->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$questions=$this->Question->find('all');
		//Заполняем данные в форме

		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data','questions'));
		}
	}
	public function admin_result($id){
		$all = $this->Questionnaire->find('all');
		//debug($all);die;
		if(is_null($id) || !(int)$id || !$this->Questionnaire->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Questionnaire->findById($id);
		$questions = $this->Question->find('all',array(
			'conditions' => array('Question.questionnaire_id' => $id),
		));
		$results=$this->Result->find('all',array(
			'conditions' => array('Result.questionnaire_id' => $id),
		));
		
		foreach ($results as $item) {
			$users[]=$item['Result']['user_id'];
		}
		$users = $this->User->find('all',array(
			'conditions' =>array('User.id' =>$users ),
			'recursive' => -1,
		));
		//debug($users);die;
		foreach ($results as $item) {
			$item['Result']['results'] = json_decode($item['Result']['results'],true);
			foreach ($item['Result']['results'] as $key => $result ) {
				$total_results[$key]['question'] = $result['question'];
				if($result['answer'] == 'Поддерживаю') {
					$total_results[$key]['Поддерживаю'] += 1;
				}else if ($result['answer'] == 'Не поддерживаю') {
					$total_results[$key]['Не поддерживаю'] += 1;
				}else {
					$total_results[$key]['Воздерживаюсь от голоса'] += 1;
				}
			}
			
			
		};
		
		 //debug($total_results);die;
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data','questions','total_results','users'));
		}
	}
	public function admin_resultview($id,$user_id){
	
	
		if(is_null($id) || !(int)$id || !$this->Questionnaire->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Questionnaire->findById($id);
		$questions = $this->Question->find('all',array(
			'conditions' => array('Question.questionnaire_id' => $id),
		));
		$results=$this->Result->find('first',array(
			'conditions' => array(array('Result.questionnaire_id' => $id),array('Result.user_id' => $user_id)),
		));
		
		$results['Result']['results'] = json_decode($results['Result']['results'],true);

		
		
		// debug($results);die;
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data','questions','total_results','results'));
		}
	}

	public function admin_delete($id){
		if (!$this->Questionnaire->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Questionnaire->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	

	
}