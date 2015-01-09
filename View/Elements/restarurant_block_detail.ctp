<?php
    //debug($restaurant);

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
<div class="panel panel-myshop">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-3">
               <?php
				if (strlen ( trim ( $restaurant ['Restaurant'] ['photo_dir'] ) ) > 0) {?>
					<img width="119" height="94" alt = "<?php echo $restaurant ['Restaurant'] ['name'];?>" src="<?php echo $this->webroot?>files/restaurant/photo/<?php echo $restaurant ['Restaurant'] ['id']?>/<?php echo $restaurant ['Restaurant'] ['photo']?>">
					
				<?php } else {
					echo $this->Html->image('empty.png', array('class' => 'img-responsive list-image', 'alt' => h($restaurant['Restaurant']['name'])));
				} 
				?>
            </div>
            <div class="col-sm-21">
                <table width="100%">
                    <tr>
                        <td width="1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <h2><?php echo h($restaurant['Restaurant']['name']); ?></h2>

                                        <p><?php echo $restaurant['Restaurant']['address']; ?></p>
                                        <strong>Type of food:</strong>&nbsp;
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
                                    </div>
                                    <div>
                                        <?php
                                            if(empty($ratings))
                                            {
                                                echo 'No Rating';
                                            } else
                                            {

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
                                                ?>

                                                <span class="rating-text">
                                            &nbsp;(<?php echo $count; ?> ratings)
                                         </span>
                                            <?php
                                            }

                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div>
                                        <strong>Business hour: </strong><br/>
                                        <?php echo $this->Time->format($restaurant['Restaurant']['open_time'], '%H:%M'); ?> - <?php echo $this->Time->format($restaurant['Restaurant']['close_time'], '%H:%M'); ?>
                                    </div>
                                    <div>
                                        <strong>Minimum Order: </strong><br/>
                                        £<?php echo $restaurant['Restaurant']['min_order']; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-ms-4 col-sm-5 col-xs-5 offerTH offerTH_<?php echo $restaurant['Restaurant']['id'] ?>">
                                    <?php if($restaurant['Restaurant']['delivery_type'] == 'Parcel'): ?>
                                        <div class="row">
                                            <div class="col-lg-24">
                                                <strong>Delivery fee: </strong><br/>£<?php echo $restaurant['Restaurant']['delivery_amount']; ?>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <strong>Collection only</strong><br/>
                                        Delivery begins at 16:00<br/>
                                    <?php endif; ?>
                                    <?php
                                        $free_delivery_distance = (int)($restaurant['Restaurant']['free_delivery_distance']);
                                        $distance               = (int)(empty($restaurant['Restaurant']['approx_distance']) ? 0 : $restaurant['Restaurant']['approx_distance']);
                                    ?>

                                    <?php
                                        if(!empty($distance))
                                        {
                                            ?>
                                            <strong>Distance:</strong> <?php echo number_format($restaurant['Restaurant']['approx_distance'], 2, '.', ''); ?> km [ Free delivery within <?php echo empty($free_delivery_distance) ? 3 : $restaurant['Restaurant']['free_delivery_distance']; ?> km]
                                        <?php
                                        } else
                                        {
                                            ?>
                                            <strong>Free delivery: </strong>
                                            <br/> <?php echo empty($free_delivery_distance) ? 3 : $restaurant['Restaurant']['free_delivery_distance']; ?> mile</li>
                                        <?php
                                        }
                                    ?>
                                    <br/>
                                    <strong>Delivery Within:</strong><br>
                                    <?php echo $restaurant['Restaurant']['delivery_within']; ?>

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
            </div>
        </div>
    </div>
</div>
