<style>
    .checkbox label {
        font-size: 16px;
    }

    input[type='checkbox'] {
        margin-top: 5px;
    }

    .checkbox {
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 25px;
        background-color: #f3f3f3;
        border-radius: 2px;
        color: #666;
        display: block;
        text-decoration: none;
    }

    .checkbox:hover {
        background-color: #e2e2e2;
        background-image: -webkit-linear-gradient(#efedee, #e2e2e2);
        background-image: -moz-linear-gradient(#efedee, #e2e2e2);
        background-image: -ms-linear-gradient(#efedee, #e2e2e2);
        background-image: -o-linear-gradient(#efedee, #e2e2e2);
        background-image: linear-gradient(#efedee, #e2e2e2);
        -webkit-box-shadow: rgba(90, 90, 90, .2) 0 1px 1px 1px;
        -moz-box-shadow: rgba(90, 90, 90, .2) 0 1px 1px 1px;
        box-shadow: rgba(90, 90, 90, .2) 0 1px 1px 1px;
    }
</style>
<div class="panel panel-myshop">
    <div class="panel-heading">
        <h3>Cuisine</h3>
    </div>
    <?php echo $this->Form->create('Restaurant', array('action' => 'search', 'class' => '', 'data-href' => Router::url(array('controller' => 'restaurants', 'action' => 'search', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')); ?>
    <div class="panel-body advance-search-body" style="padding-top: 0;">
        <!--<fieldset>
                        <?php
            echo $this->Form->input('Search.name', array('div' => array('class' => 'form-group'), 'label' => 'Restaurant Name', 'type' => 'text', 'class' => 'form-control'));
        ?>
                    </fieldset>
                    <fieldset>
                        <?php
            echo $this->Form->input('Search.postcode', array('div' => array('class' => 'form-group'), 'label' => 'Nearest Restaurent Postcode', 'type' => 'text', 'class' => 'form-control'));
        ?>
                    </fieldset>-->
        <fieldset>
            <?php
                echo $this->Form->input('Search.cuisines', array(
                    'empty'    => __('All', true),
                    'type'     => 'select',
                    'label'    => false,
                    'multiple' => 'checkbox',
                ));
            ?>
        </fieldset>
    </div>
    <div class="panel-footer">
        <?php echo $this->Form->submit('Find', array('class' => 'btn btn-success')); ?>
    </div>
    <?php echo $this->Form->end(); //debug($this->passedArgs['Search.cuisines']) ?>
</div>
