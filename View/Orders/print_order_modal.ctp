
<?php foreach($orders as $order):  ?>
    <h2>Order no : <?php echo h($order['Order']['id']); ?></h2>
    
    
<?php
    

    if(!empty($order['OrderItem'])):
        foreach($order['OrderItem'] as $orderItem):
            ?>
            
                <?php if(isset($orderItem['quantity'])) 
                    echo $orderItem['quantity']; 
                    ?> x <?php 
                if(isset($orderItem['item_name'])) 
                    echo $orderItem['item_name']; ?>
                <a href="#" class="btn btn-success">Order Now</a>
                Pounds <?php if(isset($orderItem['lineItemTotal'])) 
                    echo($orderItem['lineItemTotal']); ?><br/>
            
        <?php
        endforeach;
    endif;
    ?>
   
    
    
    <row>
        <Ltd><br>Total:</Ltd>
        <Rtd>Pounds <?php echo h($order['Order']['total_price']); ?></Rtd>
    </row>

    
<?php endforeach; ?>


