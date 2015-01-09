<?php

    class ActionTrackerBehavior extends ModelBehavior
    {

        /**
         * Initializes this behavior for the model $Model
         *
         * @param Model $Model
         * @param array $settigs list of settings to be used for this model
         * @return void
         */
        public function setup(Model $Model, $settings = array())
        {


        }

        public function cleanup(Model $Model)
        {
            //Nothing to do
        }


        public function beforeSave(Model $model, $options = array())
        {

            //TODO: use settings for field names and related things
            if(empty($model->id))
            {
                $model->data[ $model->alias ]['created_by'] = CakeSession::read('UserAuth.User.email');
            }
            $model->data[ $model->alias ]['modified_by'] = CakeSession::read('UserAuth.User.email');
            return true;
        }


    }

?>