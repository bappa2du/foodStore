<?php
App::uses ( 'AppController', 'Controller' );

/**
 * Restaurants Controller
 *
 * @property Restaurant $Restaurant
 * @property PaginatorComponent $Paginator
 */
class RestaurantsController extends AppController {
	public $name = 'Restaurants';
	public $paginate = array (
			'limit' => 2,
			'order' => array (
					'Restaurant.name' => 'asc' 
			) 
	);
	
	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array (
			'Paginator' 
	);
	
	/*
	 * search page
	 */
	public function adminSearch() {
		$this->loadModel ( 'Cusine' );
		$restaurant_postal = 'M27 4A';
		$restaurant_name = 'Taste Of India';
		
		$conditions = array (
				'Restaurant.name' => $restaurant_name,
				'Restaurant.postal' => $restaurant_postal 
		);
		
		$options = array (
				'conditions' => $conditions 
		);
		$restaurant = $this->Restaurant->find ( 'all', $options );
		// $menu=$this->Restaurant->Menu->find('all',$options);
		echo ('<pre>');
		var_dump ( $restaurant );
		echo ('</pre>');
		die ();
	}
	
	/**
	 * index method
	 *
	 * @return void
	 */
	public function adminIndex() {
		$this->Restaurant->recursive = 0;
		$this->set ( 'restaurants', $this->Paginator->paginate () );
	}
	
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function view($id = null) {
		if (! $this->Restaurant->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid restaurant' ) );
		}
		$options = array (
				'conditions' => array (
						'Restaurant.' . $this->Restaurant->primaryKey => $id 
				) 
		);
		$this->Restaurant->unbindModel(
				array('hasMany' => array('Food'))
		);
		$restaurant = $this->Restaurant->find ( 'first', $options );
		
		$this->set ( 'restaurant', $restaurant );
		$this->loadModel('Food');
		$query = "select menu.name as menu_name,'' as adf_id, f.id, f.name, f.description, f.price, '1' as type, '' as variation_name, f.restaurant_id, f.menu_id from foods as f 
					join menus as menu on menu.id = f.menu_id
					where f.restaurant_id = '$id' and f.id not in (select af.food_id from additionals as af where af.restaurant_id='$id')
					union
					select menu.name as menu_name ,adf.id as adf_id, foods.id, foods.name, foods.description, adf.price, '2' as type, adf.name, foods.restaurant_id, foods.menu_id as variation_name from additionals as adf
					join foods on adf.food_id = foods.id
					join menus as menu on menu.id = adf.menu_id
					where adf.restaurant_id = '$id' order by menu_name";
		$foods = $this->Food->query($query);
		$this->set('foods',$foods);
		
		$this->loadModel('Menu');
		$this->set('menus', $this->Menu->find('list', array('conditions'=>array('restaurant_id'=>$id))));
		
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is ( 'post' )) {
			/**
			 * For Restaurant
			 */
			$this->Restaurant->create ();
			if ($this->Restaurant->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The restaurant has been saved.' ) );
				
			} else {
				$this->Session->setFlash ( __ ( 'The restaurant could not be saved. Please, try again.' ) );
			}

			/**
			 *  For Restaurant opening hour
			 */
			
			$shopOperation = array();
			$final = array();
			$i=0;$j=0;
			foreach ($this->request->data['store_operation_day'] as $key => $day) 
			{
				$day['operation_day'] = $key;
				$day['restaurant_id'] = $this->Restaurant->getLastInsertId();
				if($day['operation_type'] == 'close')
				{
					$day['open_hour'] ='';
					$day['close_hour']='';
				}
				$shopOperation[$i] = $day;
				$i++;
			}
			$this->loadModel('RestaurentOpeningHours');
			$this->RestaurentOpeningHours->create ();
			foreach($shopOperation as $data)
			{
				$final[$j] = $data;
				$j++;
			}
			$this->RestaurentOpeningHours->saveAll($final);
			return $this->redirect ( array (
						'action' => 'add' 
				) );
		}
		$countries = $this->Restaurant->Country->find ( 'list' );
		$cities = $this->Restaurant->City->find ( 'list' );
		$cusines = $this->Restaurant->Cusine->find ( 'list',array('order'=>array('name')) );
		$this->set ( compact ( 'countries', 'cities', 'cusines' ) );
	}
	
	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function edit($id = null) {
		$this->loadModel('RestaurentOpeningHours');
		$query = "SELECT operation_day,operation_type,open_hour,close_hour FROM restaurent_opening_hours WHERE restaurant_id='$id'";
		$restaurentOpeningHours = $this->RestaurentOpeningHours->query($query);
		$this->set ( compact ( 'restaurentOpeningHours' ) );
		// pr($restaurentOpeningHours);die();
		$shopOperation = array();
				$final = array();
				$i=0;$j=0;

		if (! $this->Restaurant->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid restaurant' ) );
		}
		if ($this->request->is ( array (
				'post',
				'put' 
		) )) {
			if ($this->Restaurant->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The restaurant has been saved.' ) );
				$query = "DELETE FROM restaurent_opening_hours WHERE restaurant_id = '$id'";
				$this->RestaurentOpeningHours->query($query);

				foreach ($this->request->data['store_operation_day'] as $key => $day) 
				{
					$day['operation_day'] = $key;
					$day['restaurant_id'] = $id;
					if($day['operation_type'] == 'close')
					{
						$day['open_hour'] ='';
						$day['close_hour']='';
					}
					$shopOperation[$i] = $day;
					$i++;
				}
				
				$this->RestaurentOpeningHours->create ();
				foreach($shopOperation as $data)
				{
					$final[$j] = $data;
					$j++;
				}
				$this->RestaurentOpeningHours->saveAll($final);
				return $this->redirect ( array (
						'action' => 'adminIndex' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The restaurant could not be saved. Please, try again.' ) );
			}
		} else {
			$options = array (
					'conditions' => array (
							'Restaurant.' . $this->Restaurant->primaryKey => $id 
					) 
			);
			$this->request->data = $this->Restaurant->find ( 'first', $options );
		}
		$countries = $this->Restaurant->Country->find ( 'list' );
		$cities = $this->Restaurant->City->find ( 'list' );
		$cusines = $this->Restaurant->Cusine->find ( 'list',array('order'=>array('name')) );
		$this->set ( compact ( 'countries', 'cities', 'cusines' ) );
	}
	
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function delete($id = null) {
		$this->Restaurant->id = $id;
		if (! $this->Restaurant->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid restaurant' ) );
		}
		// $this->request->allowMethod('post', 'delete');
		
		if ($this->request->isPost ()) {
			
			if ($this->Restaurant->delete ()) {
				$this->Session->setFlash ( __ ( 'The restaurant has been deleted.' ) );
			} else {
				$this->Session->setFlash ( __ ( 'The restaurant could not be deleted. Please, try again.' ) );
			}
		}
		
		return $this->redirect ( array (
				'action' => 'adminIndex' 
		) );
	}
	
	/*
	 * search page
	 */
	public function search()
        {
        	// debug($_POST);
           	// die();
            $url['action'] = 'index';

            if(isset($_POST['lattitude']))
            {

                $this->redirect(array("controller" => "restaurants",
                                      "action" => "index",
                                      "?"=>array("lattitude" => $_POST['lattitude'],
                                                 "longitude" => $_POST['longitude']),
                                                            ),null,true);
            }
            foreach($this->data as $k => $v)
            {
                foreach($v as $kk => $vv)
                {
                    if(!empty($vv))
                    {
                        $url[ $k . '_' . $kk ] = $vv;
                    }
                }
            }

            $this->redirect($url, null, true);
        }
	
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$title = array ();
		$this->Paginator->settings ['limit'] = 10;
		$restaurants = $this->Paginator->paginate ( 'Restaurant' );
		
		/**
		 * ==========================================================================================================
		 * Search Restaurant form current user position
		 * ==========================================================================================================
		 */
		
		if ($this->request->query) {

			$current_position ['Postcode'] ['lattitude'] = $this->request->query ['lattitude'];
			$current_position ['Postcode'] ['longitude'] = $this->request->query ['longitude'];
			
			if (! empty ( $current_position )) {
				$restaurants = $this->getRestaurantDataByWithinRange ( $current_position, 5 );
			} else {
				$this->Session->setFlash ( "There is some error, Please try again." );
				$this->layout = 'error404_1';
			}
		}
		
		// $allPublishedAuthors = $this->Restaurant->find('list', array(
		// 'fields' => array('longitude','lattitude','name'),
		// 'recursive' => 0,
		// 'order' => array('Restaurant.lattitude'),
		// ));
		// $this->loadModel('Restaurant');
		// $restaurants = $this->Restaurant->find('all');
		// foreach($restaurants as $restaurant):
		// echo ($restaurant['Restaurant']['name']);
		// echo ($restaurant['Restaurant']['longitude']);
		// echo ($restaurant['Restaurant']['longitude']);
		// echo "<br/>";
		// endforeach;
		// die();
		// debug($allPublishedAuthors);
		
		// the elements from the url we set above are read
		// automagically by cake into $this->passedArgs[]
		// eg:
		// $passedArgs['Search.keywords'] = mykeyword
		// $passedArgs['Search.tag_id'] = 3
		// required if you are using Containable
		// requires Post to have the Containable behaviour
		// $contain = array();
		// we want to set a title containing all of the
		// search criteria used (not required)
		// 'OTHERFUNCTION(OModel.other_attribute) AS other'
		//
		// $restaurants = $this->Paginator->paginate('Restaurant');
		/**
		 * ==========================================================================================================
		 * filter by name
		 * ==========================================================================================================
		 */
		
		// if(isset($this->passedArgs['Search.name']))
		// {
		// $this->Paginator->settings['conditions'][]['Restaurant.name LIKE'] = '%' . $this->passedArgs['Search.name'] . '%';
		// $this->request->data['Search']['name'] = $this->passedArgs['Search.name'];
		// $title[] = __('Name', true) . ': ' . $this->passedArgs['Search.name'];
		//
		// $restaurants = $this->Paginator->paginate('Restaurant');
		// }
		
		/**
		 * ==========================================================================================================
		 * filter by postcode
		 * ==========================================================================================================
		 */
		// debug($this->passedArgs ['Search_postcode']);die();
		if (isset ( $this->passedArgs ['Search_postcode'] )) {
			
			// $this->Paginator->settings['conditions'][]['Restaurant.postal LIKE'] = '%' . $this->passedArgs['Search.postcode'] . '%';
			// Find restaurant postcode lat lon
			$this->loadModel ( 'Postcode' );
			
			$postcode = $this->passedArgs ['Search_postcode'];
			$postcode = str_replace ( ' ', '', $postcode );
			// debug($postcode);die();
			$p_length = strlen ( $postcode );
			if ($p_length > 3) {
				$split_1 = substr ( $postcode, 0, - 3 );
				$split_2 = " " . substr ( $postcode, - 3 );
				$postcode = $split_1 . "" . $split_2;
				$this->passedArgs ['Search_postcode'] = strtoupper ( $postcode );
			}
			// debug($this->passedArgs ['Search_postcode']);
			
			$postcode = $this->Postcode->find ( 'first', array (
					'conditions' => array (
							'postcode' => $this->passedArgs ['Search_postcode'] 
					) 
			) );
			// debug($postcode);
			
			if (! empty ( $postcode )) {
				
				$this->request->data ['Search'] ['postcode'] = $this->passedArgs ['Search_postcode'];
				$title [] = __ ( 'Postcode', true ) . ': ' . $this->passedArgs ['Search_postcode'];
				
				$restaurants = $this->getRestaurantDataByWithinRange ( $postcode, 5 );
				// debug($restaurants);die();
			} else {
				$this->Session->setFlash ( "Invalid Postal Code" );
				$this->layout = 'error404_1';
			}
		}
		
		/**
		 * ==========================================================================================================
		 * filter by cusine
		 * ==========================================================================================================
		 */
		if(isset($this->passedArgs['Search_cuisines'][0]) && $this->passedArgs['Search_cuisines'][0] != NULL)
		{
		$this->loadModel('Restaurant');
		
		$restaurants = $this->Restaurant->query("SELECT restaurant_id FROM cusines_restaurants WHERE cusine_id='" . $this->passedArgs['Search_cuisines'][0] . "'");
		$list_of_search_restaurants = array();
		foreach($restaurants as $restaurant)
		{
		$list_of_search_restaurants[] = $restaurant['cusines_restaurants']['restaurant_id'];
		}
		$this->Paginator->settings['conditions'][]['Restaurant.id'] = $list_of_search_restaurants;
		$restaurants = $this->Paginator->paginate('Restaurant');
		}
		
		// get posts
		// $this->Post->contain($contain); // required if you are using Containable
		// $this->paginate['reset']=false; // required if you are using Containable
		// $this->Paginator->settings['limit'] = 10;
		// $restaurants = $this->Paginator->paginate('Restaurant');
		$this->loadModel ( 'Cusines' );
		$cuisines = $this->Cusines->find ( 'list', array (
				'order' => 'name DESC' 
		) );
		
		$this->set ( compact ( 'restaurants', 'cuisines' ) );
	}
	
	/**
	 * Overridden paginate method - group by week, away_team_id and home_team_id
	 */
	public function getRestaurantDataByWithinRange($postcode, $distance) {
		$recursive = - 1;
		$lat = $postcode ['Postcode'] ['lattitude'];
		$lng = $postcode ['Postcode'] ['longitude'];
		// debug($lng);
		// debug($lat);
		// debug($distance);
		
		$query = "SELECT Restaurant.id , 3956 *2 * ASIN( SQRT( POWER( SIN( ($lat - abs( Restaurant.lattitude ) ) * pi( ) /180 /2 ) , 2 ) + COS( $lat * pi( ) /180 ) * COS( abs( Restaurant.lattitude ) * pi( ) /180 ) * POWER( SIN( ($lng - Restaurant.longitude) * pi( ) /180 /2 ) , 2 ) ) ) AS approx_distance
    	FROM restaurants AS Restaurant
    	HAVING approx_distance <= $distance
    	ORDER BY approx_distance";
		$results = $this->Restaurant->query ( $query );
		// debug($results);
		$r_array = array ();
		foreach ( $results as $r ) {
			$dist = $r ['0'] ['approx_distance'];
			$res_id = $r ['Restaurant'] ['id'];
			$restaurant = $this->Restaurant->read ( null, $res_id );
			$restaurant ['Restaurant'] ['approx_distance'] = $dist;
			$r_array [] = $restaurant;
		}
		// debug($r_array);
		return $r_array;
	}
	/*public function details($id = null) {
		if (! $this->Restaurant->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid restaurant' ) );
		}
		$this->Restaurant->recursive = 2;
		$options = array (
				'conditions' => array (
						'Restaurant.' . $this->Restaurant->primaryKey => $id 
				) 
		);
		$restaurant = $this->Restaurant->find ( 'first', $options );
		$this->loadModel ( 'Menu' );
		$this->Menu->recursive = 0;
		$menus = $this->Menu->find ( 'all', array (
				'fields' => array (
						'Menu.id',
						'Menu.name',
						'Menu.photo',
						'Menu.photo_dir' 
				),
				'conditions' => array (
						'restaurant_id' => $id 
				) 
		) );
		
		// debug($menus);
		// die();
		$this->loadModel ( 'Food' );
		$this->loadModel ( 'FoodAccessories' );
		$this->Food->recursive = 0;
		$this->FoodAccessories->recursive = 0;
		if (! empty ( $menus )) {
			foreach ( $menus as $key => $menu ) {
				$foods = $this->Food->find ( 'all', array (
						'fields' => array (
								'Food.id',
								'Food.name',
								'Food.description',
								'Food.price',
								'Food.photo',
								'Food.photo_dir' 
						),
						'conditions' => array (
								'Food.restaurant_id' => $id,
								'Food.menu_id' => $menu ['Menu'] ['id'] 
						) 
				) );
				$menus [$key] ['Food'] = $foods;
			}
		}
		// debug($menus);
		// die();
		
		$foods = $this->Food->find ( 'all' );
		// debug($foods);
		
		foreach ( $foods as $food ) {
			$food_accessories = $this->FoodAccessories->find ( 'all', array ()
			// 'fields' => array('FoodAccessories.id','FoodAccessories.name','FoodAccessories.price','FoodAccessories.food_id'),
			// 'conditions' => array('food_id' => $food['Food']['id'])
			 );
			$food_acc = $food_accessories;
		}
		$new_array = array();
		foreach ( $food_acc as $foo ) {
			// debug($foo);
			// die();
			$i = 0;
			if ($foo ['FoodAccessories'] ['food_id'] == $foo ['Food'] ['id']) {
				$new_array [$i] ['FoodAccessories'] = $foo ['FoodAccessories'];
			}
			$i ++;
		}
		
		// $this->loadModel('FoodAccessories');
		// $this->FoodAccessories->recursive = 0;
		// $food_accessories = $this->FoodAccessories->find('all');
		
		// $this->loadModel('Food');
		// $this->Food->recursive = 0;
		// $food_accessories = $this->Food->find('all');
		
		// $options = array (
		// 'joins' => array (
		// array ('table' => 'cusines_restaurants',
		// // 'alias' => 'Channel', // the alias is 'included' in the 'table' field
		// 'type' => 'LEFT',
		// 'conditions' => array (
		// 'Restaurant.id = cusines_restaurants.restaurant_id',
		// )
		// )
		// ),
		// 'conditions' => array ('Restaurant.' . $this->Restaurant->primaryKey => $id)
		// );
		// $restaurant = $this->Restaurant->find('first', $options);
		// $this->loadModel('Menu');
		// if(!empty($restaurant['Cusine'])){
		// foreach($restaurant['Cusine'] as $key => $cusine){
		// $menu = $this->Menu->find('all', array(
		// 'conditions' => array (
		// 'Menu.cusine_id' => $cusine['id'],
		// 'Menu.restaurant_id' => $id,
		// )
		// ));
		// $restaurant['Cusine'][$key]['Menu'] = $menu;
		// }
		// }
		$this->set ( compact ( 'restaurant', 'menus', 'food_acc' ) );
	}
	*/
	
	public function details($id = null)
	{
		if (!$this->Restaurant->exists($id)) {
			throw new NotFoundException(__('Invalid restaurant'));
		}
		$this->Restaurant->recursive = 2;
		$options               = array ('conditions' => array ('Restaurant.' . $this->Restaurant->primaryKey => $id));
		$restaurant            = $this->Restaurant->find('first', $options);
		$this->loadModel('Menu');
		$this->Menu->recursive = 0;
		$menus                 = $this->Menu->find('all', array (
				'fields'     => array ('Menu.id', 'Menu.name', 'Menu.photo', 'Menu.photo_dir'),
				'conditions' => array ('restaurant_id' => $id))
		);
	
		$this->loadModel('Food');
		$this->Food->recursive = 1;
		$this->loadModel('Additional');
		if (!empty($menus)) {
			foreach ($menus as $key => $menu) {
				$foods               = $this->Food->find('all', array (
						'conditions' => array (
								'Food.restaurant_id' => $id,
								'Food.menu_id'       => $menu['Menu']['id'],
						))
				);
				for($i = 0; $i < count($foods); $i++){
					$additionals              = $this->Additional->find('all', array (
							'conditions' => array (
									'Additional.restaurant_id' => $id,
									'Additional.menu_id'       => $menu['Menu']['id'],
									'Additional.food_id'       => $foods[$i]['Food']['id']
							))
					);
					if(count($additionals) > 0){
						foreach ($additionals as $add){
							$foods[$i]['Additional'][] = $add['Additional'];
						}
					}
				}
				
				$menus[$key]['Food'] = $foods;
			}
		}
		$this->set(compact('restaurant', 'menus'));
	
	}
	
	
	public function findLatlngForPostCode() {
		$this->loadModel ( 'Postcode' );
		$postcode = $this->request->data ['postcode'];
		if (! empty ( $postcode )) {
			$data = $this->Postcode->findLatlngForPostCode ( $postcode );
			$output = array ();
			if ($data) {
				$output ['lat'] = $data ['Postcode'] ['lattitude'];
				$output ['lng'] = $data ['Postcode'] ['longitude'];
			}
			else{
				$output = 0;
			}
		} else {
			$output = 0;
		}
		return new CakeResponse ( array (
				'type' => 'application/json',
				'body' => json_encode ( $output ) 
		) );
	}
	
	public function getPostCodeListAutoComplete()
	{
		$postcode = $this->request->query['query'];
		$postcode = str_replace ( ' ', '', $postcode );
		/*$p_length = strlen ( $postcode );
		if ($p_length > 3) {
			$split_1 = substr ( $postcode, 0,  3 );
			$split_2 = " " . substr ( $postcode,  3 );
			$postcode = $split_1 . "" . $split_2;
		}*/
		$query = "select * from postcodes where replace(`postcode`,' ','') like '$postcode%'";
		$this->loadModel('Postcode');
		$data = $this->Postcode->query($query);
		$output['suggestions'] = array();
		if(count($data) > 0){
			foreach($data as $row){
				$nRow = array();
				$nRow['data'] = $row['postcodes']['id'];
				$nRow['value'] = $row['postcodes']['postcode'];
				$output['suggestions'][] = $nRow;
			}
		}else{
			$output['suggestions'] = 0;
		}
		return new CakeResponse(array('type'=>'application/json', 'body'=>json_encode($output)));
	}

	public function getCityListAutoComplete()
	{
		$city = $this->request->query['query'];
		$city = str_replace ( ' ', '', $city );
		$query = "select * from cities where name like '$city%'";
		$this->loadModel('City');
		$data = $this->City->query($query);
		$output['suggestions'] = array();
		if(count($data) > 0){
			foreach($data as $row){
				$nRow = array();
				$nRow['data'] = $row['cities']['id'];
				$nRow['value'] = $row['cities']['name'];
				$output['suggestions'][] = $nRow;
			}
		}else{
			$output['suggestions'] = 0;
		}
		return new CakeResponse(array('type'=>'application/json', 'body'=>json_encode($output)));
	}

	/**
	 * ====================================
	 * New Action for Modal update/Delete  |
	 * ====================================
	 */
	public function updateRestaurantFoodItem($id=null,$add_food_id = null)
	{
            $this->loadModel('Food');
            
            $this->loadModel('Additional');
            
            $this->Food->id    = $id;
            
            if($this->request->isPost())
            {
            	$check_data = $this->checkDuplicateFoodFromController($id, $$this->request->data['restaurant_id'], $this->request->data['menu_id'], $this->request->data['name']);
            	
            	if($check_data[0][0]['count'] > 0)
            	{
            		$this->Session->setFlash ( __ ( 'Duplicate Food for restaurant.' ) );
            	
            		return $this->redirect(array('controller'=>'restaurants','action' => 'view/'.$this->request->data['restaurant_id']));
            	}
            	
            	if($add_food_id)
            	{
            		$this->Additional->id = $add_food_id;
            		
            		$this->Additional->set('name',$this->request->data['variation']);
            		
            		$this->Additional->set('price',$this->request->data['price']);
            		
            		$this->Additional->save();
            		
            		$this->Food->id = $id;
            		
            		$this->Food->set('name', $this->request->data['name']);
            		
            		$this->Food->set('description', $this->request->data['description']);
            		
            		$this->Food->save();
            		
            		if($this->Additional->save() && $this->Food->save())
            		{
            			$this->Session->setFlash(__('The food has been updated.'));
            		}
            	}
            	else
            	{
            		$this->Food->id = $id;
            		
            		$this->Food->set('name', $this->request->data['name']);
            		
            		$this->Food->set('description', $this->request->data['description']);
            		
            		$this->Food->set('price', $this->request->data['price']);
            		
            		if($this->Food->save())
            		{
            			$this->Session->setFlash(__('The food has been updated.'));
            		}
            	}
            }
            return $this->redirect(array(
                    'controller'=>'restaurants',
                    'action' => 'view/'.$this->request->data['restaurant_id'])
            );
        }

        public function deleteRestaurantFoodItem($id = null,$restaurantId = null, $add_id = null)
        {
            $this->loadModel('Additional');
            $this->loadModel('Food');
            if($this->request->isPost())
            {
            	if($add_id){
            		$this->Additional->id = $add_id;
            		if($this->Additional->delete())
            		{
            			$this->Session->setFlash(__('The food has been deleted.'));
            		}
            		else
            		{
            			$this->Session->setFlash(__('The food could not be deleted. Please, try again.'));
            		}
            	}
            	else{
            		$this->Food->id = $id;
            		if($this->Food->delete())
            		{
            			$this->Session->setFlash(__('The food has been deleted.'));
            		}
            		else
            		{
            			$this->Session->setFlash(__('The food could not be deleted. Please, try again.'));
            		}
            	}
            }
            return $this->redirect(array(
                    'controller'=>'restaurants',
                    'action' => 'view/'.$restaurantId)
            );
        }

        public function updateRestaurantMenuItem($id=null)
        {
            $this->loadModel('Menu');
            
            $this->Menu->id    = $id;
            
            if($this->request->isPost())
            {
            	$check_data = $this->checkDuplicateFromMenuController($id, $this->request->data['restaurant_id'], $this->request->data['name']);
            	 
            	if($check_data[0][0]['count'] > 0)
            	{
            		$this->Session->setFlash ( __ ( 'Duplicate Menu for restaurant.' ) );
            		
            		return $this->redirect(array('controller'=>'restaurants','action' => 'view/'.$this->request->data['restaurant_id']));
            	}
            	
                if($this->Menu->save($this->request->data))
                {
                    $this->Session->setFlash(__('The Menu has been updated.'));
                } 
            }

            return $this->redirect(array(
                    'controller'=>'restaurants',
                    'action' => 'view/'.$this->request->data['restaurant_id'])
            );
        }

        public function deleteRestaurantMenuItem($id = null,$restaurantId = null)
        {
            
            $this->loadModel('Menu');
            $this->Menu->id = $id;
            if($this->request->isPost())
            {
                if($this->Menu->delete())
                {
                    $this->Session->setFlash(__('The Menu has been deleted.'));
                } 
                else
                {
                    $this->Session->setFlash(__('The Menu could not be deleted. Please, try again.'));
                }
            }
            return $this->redirect(array(
                    'controller'=>'restaurants',
                    'action' => 'view/'.$restaurantId)
            );
        }

        public function updateRestaurantAdditionalItem($id=null){
            $this->loadModel('Additional');
            $this->Additional->id    = $id;
            if($this->request->isPost())
            {
                if($this->Additional->save($this->request->data))
                {
                    $this->Session->setFlash(__('The Additional has been updated.'));
                } 
            }

            return $this->redirect(array(
                    'controller'=>'restaurants',
                    'action' => 'view/'.$this->request->data['restaurant_id'])
            );
        }

        public function deleteRestaurantAdditionalItem($id = null,$restaurantId = null)
        {
            $this->loadModel('Additional');
            $this->Additional->id = $id;
            if($this->request->isPost())
            {
                if($this->Additional->delete())
                {
                    $this->Session->setFlash(__('The Additional has been deleted.'));
                } 
                else
                {
                    $this->Session->setFlash(__('The Additional could not be deleted. Please, try again.'));
                }
            }
            return $this->redirect(array(
                    'controller'=>'restaurants',
                    'action' => 'view/'.$restaurantId)
            );
        }
        
        public function add_menu($res_id = null)
        {
        	if($this->request->isPost())
        	{
        		$this->loadModel('Menu');
        		
        		$check_data = $this->checkDuplicateFromMenuController(0, $res_id, $this->request->data['name']);
        			
        		if($check_data[0][0]['count'] > 0)
        		{
        			$this->Session->setFlash ( __ ( 'Duplicate Menu for restaurant.' ) );
        			return $this->redirect(array('controller'=>'restaurants','action' => 'view/'.$res_id));
        		}
        		
        		$this->Menu->create();
        		
        		if($this->Menu->save($this->request->data))
        		{
        			$this->Session->setFlash(__('The Menu has been added.'));
        		}
        		else
        		{
        			$this->Session->setFlash(__('The Menu could not be deleted. Please, try again.'));
        		}
        	}
        	return $this->redirect(array(
        			'controller'=>'restaurants',
        			'action' => 'view/'.$res_id)
        	);
        }
        
        public function add_food($res_id = null)
        {
        	if($this->request->isPost())
        	{
        		$this->loadModel('Food');
        		
        		if (empty ( $this->request->data['menu_id'] )) 
        		{
        			$this->Session->setFlash ( __ ( 'Please select a menu before save.' ) );
        			
        			return $this->redirect(array('controller'=>'restaurants','action' => 'view/'.$res_id));;
        		}
        		
        		$check_data = $this->checkDuplicateFoodFromController(0, $res_id, $this->request->data['menu_id'], $this->request->data['name']);
        		 
        		if($check_data[0][0]['count'] > 0)
        		{
        			$this->Session->setFlash ( __ ( 'Duplicate Food for restaurant.' ) );
        			
        			return $this->redirect(array('controller'=>'restaurants','action' => 'view/'.$res_id));
        		}
        		
        		$this->Food->create();
        		
        		if($this->Food->save($this->request->data))
        		{
        			$this->Session->setFlash(__('The Food has been added.'));
        		}
        		else
        		{
        			$this->Session->setFlash(__('The Food could not be deleted. Please, try again.'));
        		}
        	}
        	return $this->redirect(array(
        			'controller'=>'restaurants',
        			'action' => 'view/'.$res_id)
        	);
        }
        
        public function add_food_variation($res_id = null){
        	if($this->request->isPost())
        	{
        		$this->loadModel('Additional');
        		$this->Additional->create();
        		if($this->Additional->save($this->request->data['variation']))
        		{
        			$this->Session->setFlash(__('Food Variation has been added.'));
        		}
        		else
        		{
        			$this->Session->setFlash(__('Food Variation could not be deleted. Please, try again.'));
        		}
        	}
        	return $this->redirect(array(
        			'controller'=>'restaurants',
        			'action' => 'view/'.$res_id)
        	);
        }
        
        public function checkDuplicateFromMenuController($id = 0, $res_id, $name)
        {
        	$query = "SELECT count(*) as count from menus where name = '$name' and id != '$id' and restaurant_id = '$res_id'";
        		
        	$this->loadModel('Menu');
        	
        	return $queryResult = $this->Menu->query($query);
        }
        
        public function checkDuplicateFoodFromController($id = 0, $res_id, $menu_id, $name)
        {
        	$this->loadModel('Food');
        	
        	$query = "SELECT count(*) as count from foods where name = '$name' and id != '$id' and restaurant_id = '$res_id' and menu_id = '$menu_id'";
        
        	return $queryResult = $this->Food->query($query);
        }
}


