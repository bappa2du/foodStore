<?php
    App::uses('AppController', 'Controller');

    class CusinesController extends AppController
    {


        public $components = array('Paginator');


        public function index()
        {
            $this->Cusine->recursive = 0;
            $this->set('cusines', $this->Paginator->paginate());
        }


        public function view($id = null)
        {
            if(!$this->Cusine->exists($id))
            {
                throw new NotFoundException(__('Invalid cusine'));
            }
            $options = array('conditions' => array('Cusine.' . $this->Cusine->primaryKey => $id));
            $this->set('cusine', $this->Cusine->find('first', $options));
        }


        public function add()
        {
            if($this->request->is('post'))
            {
                $this->Cusine->create();
                if($this->Cusine->save($this->request->data))
                {
                    $this->Session->setFlash(__('The cusine has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The cusine could not be saved. Please, try again.'));
                }
            }
        }


        public function edit($id = null)
        {
            if(!$this->Cusine->exists($id))
            {
                throw new NotFoundException(__('Invalid cusine'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->Cusine->save($this->request->data))
                {
                    $this->Session->setFlash(__('The cusine has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The cusine could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('Cusine.' . $this->Cusine->primaryKey => $id));
                $this->request->data = $this->Cusine->find('first', $options);
            }
        }


        public function delete($id = null)
        {
            $this->Cusine->id = $id;
            if(!$this->Cusine->exists())
            {
                throw new NotFoundException(__('Invalid cusine'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->Cusine->delete())
                {
                    $this->Session->setFlash(__('The cusine has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The cusine could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
        
        public function importAllCuisines(){
        	$data = new Spreadsheet_Excel_Reader ( 'files/all_cuisines.xls', true );
        	$temp = $data->dumptoarray ();
        	$cuisines = array();
        	foreach($temp as $t){
        		$this->Cusine->create();
        		$cuisines[]['name'] = $t[1];
        	}
        	if($this->Cusine->saveAll($cuisines)){
        		debug("Done");
        	}
        	else{
        		debug("Failed");
        	}
        	
        	$cities = array();
        	$data = new Spreadsheet_Excel_Reader ( 'files/UK_CITIES_TOWNS.xls', true );
        	$temp = $data->dumptoarray ();
        	$this->loadModel('City');
        	foreach($temp as $t){
        		$this->City->create();
        		$cities[]['name'] = $t[1];
        	}
        	if($this->City->saveAll($cities)){
        		debug("Done");
        	}
        	else{
        		debug("Failed");
        	}
        	die();
        	
        }
        
        /**
         * Check Duplicate Name
         */
        public function checkDuplicateCusine()
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
