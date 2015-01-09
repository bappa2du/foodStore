<?php
    App::uses('Controller', 'Controller');
    App::import('Vendor', 'php-excel-reader/excel_reader2');
    class AppController extends Controller
    {
        public $helpers    = array('Form', 'Time', 'Html', 'Session', 'Js', 'Time', 'Usermgmt.UserAuth');
        public $components = array('Session', 'RequestHandler', 'Email', 'Usermgmt.UserAuth');//,'DebugKit.Toolbar'
        

        // Print API credential
        public $userName_API = 'admin';
        public $password_API = 'pos@print!order';

        public function beforeFilter()
        {
            $this->paginate = array('limit'=>1000000);

            $this->userAuth();
            $this->preset();
            $this->pickLayout();
            $this->UserAuth->logoutRedirect = array('action' => 'home', 'controller' => 'webpages');
            parent::beforeFilter();

            $this->set('categories', ClassRegistry::init('Category')->find('all'));
            $this->set('webpages', ClassRegistry::init('Webpage')->find('all'));
        }

        private function userAuth()
        {
            $this->UserAuth->beforeFilter($this);
        }

        private function pickLayout()
        {

            if(
                $this->params->url == 'dashboard'
                || $this->params->url == 'allUsers'
                || $this->params->url == 'addUser'
                || $this->params->url == 'myprofile'
                || $this->params->url == 'changePassword'
                || ($this->params['controller'] == 'users' && $this->params['action'] == 'viewUser')
                || ($this->params['controller'] == 'users' && $this->params['action'] == 'editUser')
                || ($this->params['controller'] == 'users' && $this->params['action'] == 'changeUserPassword')

                || ($this->params['controller'] == 'user_groups' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'user_groups' && $this->params['action'] == 'addGroup')
                || ($this->params['controller'] == 'user_groups' && $this->params['action'] == 'editGroup')

                || ($this->params['controller'] == 'user_group_permissions' && $this->params['action'] == 'index')

                || ($this->params['controller'] == 'restaurants' && $this->params['action'] == 'adminIndex')
                || ($this->params['controller'] == 'restaurants' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'restaurants' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'restaurants' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'cusines' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'cusines' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'cusines' && $this->params['action'] == 'view')
                || ($this->params['controller'] == 'cusines' && $this->params['action'] == 'edit')

                || ($this->params['controller'] == 'menus' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'menus' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'menus' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'menus' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'foods' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'foods' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'foods' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'foods' && $this->params['action'] == 'view')
                || ($this->params['controller'] == 'foods' && $this->params['action'] == 'sownersfoods')
                || ($this->params['controller'] == 'foods' && $this->params['action'] == 'priceedit')

                || ($this->params['controller'] == 'additionals' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'additionals' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'additionals' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'additionals' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'orders' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'orders' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'orders' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'orders' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'order_items' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'order_items' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'order_items' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'order_items' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'packages' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'packages' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'packages' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'packages' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'package_details' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'package_details' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'package_details' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'package_details' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'offers' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'offers' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'offers' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'offers' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'comments' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'comments' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'comments' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'comments' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'categories' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'categories' && $this->params['action'] == 'view')
                || ($this->params['controller'] == 'categories' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'categories' && $this->params['action'] == 'edit')

                || ($this->params['controller'] == 'webpages' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'webpages' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'webpages' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'webpages' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'countries' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'countries' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'countries' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'countries' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'cities' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'cities' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'cities' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'cities' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'currencies' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'currencies' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'currencies' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'currencies' && $this->params['action'] == 'view')

                || ($this->params['controller'] == 'pointvalues' && $this->params['action'] == 'index')
                || ($this->params['controller'] == 'pointvalues' && $this->params['action'] == 'add')
                || ($this->params['controller'] == 'pointvalues' && $this->params['action'] == 'edit')
                || ($this->params['controller'] == 'pointvalues' && $this->params['action'] == 'view')
            )
            {
                $this->theme = 'Bs3admin';
                //$this->layout = 'login';
            } else
            {
                $this->theme = 'Myshop';
            }//echo $this->params['controller'];
        }

        private function preset()
        {
            $this->set('_user', $this->UserAuth->getUser());
        }
    }

