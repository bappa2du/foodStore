<?php
    $ratings = 0;
    $count   = 0;

    if(isset($restaurant['Comment']))
    {
        foreach($restaurant['Comment'] as $comment)
        {
            $count++;
            $ratings += (int)$comment['quality_rating'];
            $ratings += (int)$comment['delivery_time_rating'];
            $ratings += (int)$comment['service_rating'];
        }
        $ratings = $ratings ? round($ratings / (3 * $count)) : 0;
        $ratings = (int)$ratings;
    }



?>
<style>
    a:hover {
        text-decoration: none;
    }

    a {
        color: #000000
    }
</style>
<?php //debug($restaurant);die(); ?>
<a href="/restaurants/details/<?php echo $restaurant['Restaurant']['id']; ?>">
<div class="panel panel-myshop">
<div class="panel-heading">
    <div class="pull-right" style="margin-top: 10px;">
        <?php
            if(empty($ratings))
            {
                //echo 'No Rating';
                for($i = 0; $i < 5; $i++)
                {
                    echo ' <i class="glyphicon glyphicon-star gray"></i>';
                }
            } else
            {
                ?>
                <span style="color: #000;">User Rating</span> (<?php echo $count; ?> ratings)<br/>
                <?php
                for($i = 0; $i < $ratings; $i++)
                {
                    ?>
                    <i class="glyphicon glyphicon-star"></i>
                <?php
                }
                for($i = 0; $i < (5 - $ratings); $i++)
                {
                    ?>
                    <i class="glyphicon glyphicon-star gray"></i>
                <?php
                }
            }

        ?>
    </div>
    <h2 class="resName"><?php echo h($restaurant['Restaurant']['name']); ?></h2>

    <?php echo $restaurant['Restaurant']['address']; ?>
</div>
<div class="panel-body">
<div class="row">
<div class="col-sm-4">
	<?php
	if (strlen ( trim ( $restaurant ['Restaurant'] ['photo_dir'] ) ) > 0) {?>
		<img width="119" height="94" alt = "<?php echo $restaurant ['Restaurant'] ['name'];?>" src="<?php echo $this->webroot?>files/restaurant/photo/<?php echo $restaurant ['Restaurant'] ['id']?>/<?php echo $restaurant ['Restaurant'] ['photo']?>">
		
	<?php } else {
		echo $this->Html->image('empty.png', array('class' => 'img-responsive list-image', 'alt' => h($restaurant['Restaurant']['name'])));
	} 
	?>
</div>
<div class="col-sm-20">
<table width="100%">
    <tr>
        <td width="80%">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <strong>Type of food:</strong><br/>
                        <?php
                            if($restaurant['Cusine']):
                                $loopCount = 0;
                                $sep       = ', ';
                                foreach($restaurant['Cusine'] as $resType):
                                    if($loopCount > 0)
                                    {
                                        echo $sep;
                                    }
                                    echo trim($resType['name']);
                                    $loopCount++;
                                endforeach;
                            endif;
                        ?>
                        <br/>
<!--                        <strong>Position:</strong><br/>-->
                        <!--                                    --><?php //echo $restaurant['Restaurant']['lattitude'].','.$restaurant['Restaurant']['longitude'] ?>

                        <br/>

<!--                        --><?php //getPlaceName($restaurant['Restaurant']['lattitude'], $restaurant['Restaurant']['longitude']); ?>

                    </div>

                    <?php if(isset($restaurant['Restaurant']['approx_distance']))
                    {
                        ?>
                        <div>
                            <strong>Distance (mi): </strong><br/>
                            <?php echo number_format($restaurant['Restaurant']['approx_distance'], 3) ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-8">
                    <div>
                        <strong>Business hour: </strong><br/>
                        <?php echo $restaurant['Restaurant']['open_time']; ?> - <?php echo $restaurant['Restaurant']['close_time']; ?>
                    </div>
                    <div>
                        <strong>Minimum Order: </strong><br/>
                        £<?php echo $restaurant['Restaurant']['min_order']; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-ms-4 col-sm-5 col-xs-5 offerTH offerTH_<?php echo $restaurant['Restaurant']['id'] ?>">
                    <div class="offerBTH">
                        <?php
                            if(isset($restaurant['Offer'][0]['discount_amount'])):
                                echo '<h4 class="text-right offer-button">Save&nbsp;' . $restaurant['Offer'][0]['discount_amount'] . $restaurant['Offer'][0]['discount_type'] . '</h4>';
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </td>
        <?php
            if($viewDetails)
            {
                ?>
                <td id="btmTH_<?php echo $restaurant['Restaurant']['id'] ?>" width="20%">
                    <?php
                        echo $this->Html->link('View Menu &raquo;', array('controller' => 'restaurants', 'action' => 'details', $restaurant['Restaurant']['id']), array('class' => 'btn btn-success btn-lg pull-right ', 'escape' => false, 'data-href' => Router::url(array('controller' => 'restaurants', 'action' => 'details', $restaurant['Restaurant']['id'], '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage'));
                    ?>
                </td>
                <script>
                    var btmTH = $('#btmTH_<?php echo $restaurant['Restaurant']['id'] ?>').height();
                    $('.offerTH_<?php echo $restaurant['Restaurant']['id'] ?>').css('height', btmTH);
                </script>
            <?php
            }
        ?>
    </tr>
</table>
<hr>
<?php if($restaurant['Restaurant']['delivery_type'] == 'Parcel'): ?>
    <!--     <div class="row">
                        <div class="col-lg-24">
                            <strong>Delivery fee: </strong>£<?php //echo $restaurant['Restaurant']['delivery_amount']; ?>
                        </div>
                    </div> -->
<?php else: ?>
    <strong>Collection only</strong><br/>
    Delivery begins at <?php echo($restaurant['Restaurant']['delivery_time']); ?><br/>
<?php endif; ?>
<!--<strong>Opens at: </strong> <?php echo $this->Time->format($restaurant['Restaurant']['open_time'], '%H:%M'); ?>
                <br/>-->

<?php
    $free_delivery_distance = (int)($restaurant['Restaurant']['free_delivery_distance']);
    $distance               = (int)(empty($restaurant['Restaurant']['approx_distance']) ? 0 : $restaurant['Restaurant']['approx_distance']);
?>

<?php
    /* if (!empty($distance)) {
         ?>
         <strong>Distance:</strong> <?php echo number_format($restaurant['Restaurant']['approx_distance'], 2, '.', ''); ?> km [ Free delivery within <?php echo empty($free_delivery_distance) ? 3 : $restaurant['Restaurant']['free_delivery_distance']; ?> km]
         <?php
     } else {
         ?>
         <strong>Free delivery: </strong> <?php echo empty($free_delivery_distance) ? 3 : $restaurant['Restaurant']['free_delivery_distance']; ?> km</li>
         <?php
     }*/
    $distance = number_format($distance, 3);

    if(floatval($distance) <= floatval($free_delivery_distance))
    {
        if(!empty($restaurant['Restaurant']['free_delivery_amount']))
        {
            echo "Free Delivery on orders over £" . $restaurant['Restaurant']['free_delivery_amount'];
        } else
        {
            echo "Free Delivery";
        }

    } else
    {
        ?>
        <div class="row">
            <div class="col-lg-24">
                <strong>Delivery fee: </strong>£<?php echo $restaurant['Restaurant']['delivery_amount']; ?>[ Free delivery within <?php echo $free_delivery_distance; ?> mile]
            </div>
        </div>
    <?php
    }
?>

</div>
</div>
</div>
</div>
</a>

