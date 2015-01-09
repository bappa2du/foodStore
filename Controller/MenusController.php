<?php
App::uses ( 'AppController', 'Controller' );

/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property PaginatorComponent $Paginator
 */
class MenusController extends AppController {
	
	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array (
			'Paginator' 
	);
	
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$data = $this->Menu->recursive = 0;
		$conditions = array();
		$restaurant = 0;
		
		if(isset($this->request->query['city'])){
			$this->set('city', $this->request->query['city']);
			$this->Session->write('city', $this->request->query['city']);
		}
		if(isset($this->request->query['postal'])){
			$this->set('postal', $this->request->query['postal']);
			$this->Session->write('postal', $this->request->query['postal']);
		}
		if(isset($this->request->query['restaurant_id']) && !empty($this->request->query['restaurant_id'])){
			$restaurant = $this->request->query['restaurant_id'];
			$conditions = array('restaurant_id'=>$restaurant);
			$this->set('restaurant', $this->request->query['restaurant_id']);
			$this->Session->write('restaurant', $this->request->query['restaurant_id']);
		}
		
		$this->set ( 'menus', $this->Paginator->paginate ($conditions) );
		$this->loadModel('Restaurant');
		$this->set('restaurants', $this->Restaurant->find('list'));
			
	}
	
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function view($id = null) {
		if (! $this->Menu->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid menu' ) );
		}
		$options = array (
				'conditions' => array (
						'Menu.' . $this->Menu->primaryKey => $id 
				) 
		);
		$this->set ( 'menu', $this->Menu->find ( 'first', $options ) );
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is ( 'post' )) {
			if (empty ( $this->request->data ['Menu'] ['restaurant_id'] )) {
				$this->Session->setFlash ( __ ( 'Please select a restaurant before save.' ) );
				return;
			}
			
			$res = $this->request->data ['Menu'] ['restaurant_id'];
			
			$menus = array ();
			foreach ( $this->request->data ['MenuItem'] as $m ) {
				$this->Menu->create ();
				$menu = $m;
				$menu ['restaurant_id'] = $res;
				$menus [] = $menu;
			}
			
			if ($this->Menu->saveAll ( $menus )) {
				$this->Session->setFlash ( __ ( 'The menus has been saved.' ) );
				return $this->redirect ( array (
								'action' => 'add?city='.$this->request->data ['Menu']['city'].'&&postal='.$this->request->data ['Menu']['postal'].'&&restaurant_id='.$this->request->data ['Menu'] ['restaurant_id'] 
						));
			} else {
				$this->Session->setFlash ( __ ( 'The menu could not be saved. Please, try again.' ) );
			}
		}
		else{

			if(isset($this->request->query['city'])){
				$this->set('city', $this->request->query['city']);
			}
			if(isset($this->request->query['postal'])){
				$this->set('postal', $this->request->query['postal']);
			}
			if(isset($this->request->query['restaurant_id'])){
				$this->set('restaurant', $this->request->query['restaurant_id']);
			}
		}
		$cusines = $this->Menu->Cusine->find ( 'list' );
		$restaurants = $this->Menu->Restaurant->find ( 'list');
		$this->set ( compact ( 'cusines', 'restaurants' ) );
	}
	
	
	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function edit($id = null) {
		if (! $this->Menu->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid menu' ) );
		}
		if ($this->request->is ( array (
				'post',
				'put' 
		) )) {
			if ($this->Menu->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The menu has been saved.' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The menu could not be saved. Please, try again.' ) );
			}
		} else {
			$options = array (
					'conditions' => array (
							'Menu.' . $this->Menu->primaryKey => $id 
					) 
			);
			$this->request->data = $this->Menu->find ( 'first', $options );
		}
		$cusines = $this->Menu->Cusine->find ( 'list' );
		$restaurants = $this->Menu->Restaurant->find ( 'list' );
		$this->set ( compact ( 'cusines', 'restaurants' ) );
	}
	
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function delete($id = null) {
		$this->Menu->id = $id;
		if (! $this->Menu->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid menu' ) );
		}
		
		if ($this->request->isPost ()) {
			
			if ($this->Menu->delete ()) {
				$this->Session->setFlash ( __ ( 'The menu has been deleted.' ) );
			} else {
				$this->Session->setFlash ( __ ( 'The menu could not be deleted. Please, try again.' ) );
			}
		}
		
		return $this->redirect ( array (
				'action' => 'index' 
		) );
	}
	
	/*
	 * Get Restaurant List for autocomplete
	 */
	public function getRestaurantListByPostCode() 
	{
		$this->loadModel('Restaurant');
		$postcode = $this->request->data['postal'];
		$data = $this->Restaurant->getRestaurantListByPostCode($postcode);
		$output = array();
		if(count($data) > 0){
			foreach($data as $row){
				$nRow = array();
				$nRow['id'] = $row['Restaurant']['id'];
				$nRow['name'] = $row['Restaurant']['name'];
				$output[] = $nRow;
			}
		}else{
			$output = 0;
		}
		return new CakeResponse(array('type'=>'application/json','body'=>json_encode($output)));
	}

	public function getRestaurantListByCity()
	{
		$this->loadModel('Restaurant');
		$city = $this->request->data['city'];
		$data = $this->Restaurant->getRestaurantListByCity($city);
		$output = array();
		if(count($data) > 0){
			foreach($data as $row){
				$nRow = array();
				$nRow['id'] = $row['Restaurant']['id'];
				$nRow['name'] = $row['Restaurant']['name'];
				$output[] = $nRow;
			}
		}else{
			$output = 0;
		}
		return new CakeResponse(array('type'=>'application/json','body'=>json_encode($output)));
	}

	public function getBlurCityResponse()
	{
		$city = $this->request->data['city'];
		$this->loadModel('City');
		$city_data = $this->City->find('first', array('conditions'=>array('City.name'=>$city)));
		if(empty($city_data))
		{
			return new CakeResponse(array('type'=>'application/json','body'=>json_encode(0)));
		}
		else
		{
			return new CakeResponse(array('type'=>'application/json','body'=>json_encode(1)));
		}
	}

	public function getBlurPostCodeResponse()
	{
		$postcode = $this->request->data['postal'];
		$this->loadModel('Postcode');
		$postcode_data = $this->Postcode->find('first', array('conditions'=>array('Postcode.postcode'=>$postcode)));
		if(empty($postcode_data))
		{
			return new CakeResponse(array('type'=>'application/json','body'=>json_encode(0)));
		}
		else
		{
			return new CakeResponse(array('type'=>'application/json','body'=>json_encode(1)));
		}
	}
	public function getDefaultRestaurantList()
	{
		$this->loadModel('Restaurant');
		$data = $this->Restaurant->find('all');
		$output = array();
		if(count($data) > 0){
			foreach($data as $row){
				$nRow = array();
				$nRow['id'] = $row['Restaurant']['id'];
				$nRow['name'] = $row['Restaurant']['name'];
				$output[] = $nRow;
			}
		}else{
			$output = 0;
		}
		return new CakeResponse(array('type'=>'application/json','body'=>json_encode($output)));
	}

	public function getRestaurantListByQuery() 
	{
		$this->loadModel('Restaurant');
		$this->loadModel('City');
		$postcode = $this->request->data['postal'];
		$city = $this->request->data['city'];
		$data = $this->Restaurant->getRestaurantListByQuery($postcode,$city);
		$output = array();
		if(count($data) > 0){
			foreach($data as $row){
				$nRow = array();
				$nRow['id'] = $row['Restaurant']['id'];
				$nRow['name'] = $row['Restaurant']['name'];
				$output[] = $nRow;
			}
		}else{
			$output = 0;
		}
		return new CakeResponse(array('type'=>'application/json','body'=>json_encode($output)));
	}
	
	
	/**
	 * Check Duplicate Name
	 */
	public function checkDuplicateMenu()
	{
		$paramsArray = $this->request->data;
		 
		$modelName = $paramsArray['0'];
		 
		$modelId = $paramsArray['1'];
		 
		$this->loadModel($modelName);
		 
		$tableName = $this->$modelName->table;
		 
		$where = "1 and $tableName.id != '$modelId'";
		 
		foreach($paramsArray as $param => $value)
		{
			if(is_array($value))
			{
				$key = $value['0'];
				 
				$keyVal = $value['1'];
				 
				$where .= " and $key = '$keyVal'";
			}
		}
		 
		$query = "SELECT count(*) as count from $tableName where $where";
		 
		$queryResult = $this->$modelName->query($query);
		 
		if($queryResult['0']['0']['count'] > 0)
		{
			return new CakeResponse(array('type'=>'application/json', 'body'=>json_encode(1)));
		}
		else
		{
			return new CakeResponse(array('type'=>'application/json', 'body'=>json_encode(0)));
		}
	}
}