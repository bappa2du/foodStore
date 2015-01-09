<div class="panel panel-myshop">
    <div class="panel-heading order-heading">
        Your Order
    </div>
    <div class="panel-body">
        <div id="cartContent">
        </div>
        <br>
    </div>
    <div id="CheckoutBtn" class="panel-footer txtrt" style="text-align: left">
        <?php

            if($checkout)
            {
                echo $this->Html->link('Go to checkout', array('controller' => 'orders', 'action' => 'checkout'), array('class' => 'btn btn-success btn-lg', 'escape' => false, 'data-href' => Router::url(array('controller' => 'orders', 'action' => 'checkout', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage'));
            }
            if($addmore)
            {

                echo $this->Html->link('Add More food', array('controller' => 'restaurants', 'action' => 'details', $restaurant['Restaurant']['id']), array('class' => 'btn btn-success btn-lg', 'escape' => false));
            }
        ?>
    </div>
</div>