<div class="container">
    <div class="carousel-caption">
        <h1>Order Takeaway Online!</h1>

        <div class="search-box">
            <?php echo $this->Form->create('Restaurant', array('action' => 'search', 'class' => 'form-inline', 'data-href' => Router::url(array('controller' => 'restaurants', 'action' => 'search', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')); ?>
            <?php
                echo $this->Form->input('Search.postcode', array('div' => array('class' => 'form-group'), 'label' => false, 'type' => 'text', 'class' => 'form-control input-lg search-query', 'placeholder' => "Enter your postcode (E.g AB1 0AA) ..."));
            ?>
            <button type="submit" class="btn btn-lg btn-success">Find Takeaway &raquo;</button>
            <?php echo $this->Form->end(); ?>
            <!--            <form class="form-inline" role="form">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg search-query" id="postcode" placeholder="Enter your postcode ...">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success">Find Takeaway &raquo;</button>
                        </form>-->
        </div>
    </div>
</div>
<style>
    #RestaurantSearchForm {
        margin: 0;
        padding: 0;
    }

    #RestaurantSearchForm .form-group {
        width: 70%;
        float: left;
        padding-left: 0;
    }

    #RestaurantSearchForm .form-group .form-control {
        max-width: 100%;
    }

    #RestaurantSearchForm .btn {
        width: 30%;
        max-width: 500px;
    }
</style>