<?php
date_default_timezone_set('Europe/London');
$open_time  = $restaurant['Restaurant']['open_time'];
$close_time = $restaurant['Restaurant']['close_time'];
$open = date('H:i:s', strtotime($open_time));
$open       = (int)str_replace(":", "", $open);
$close = date('H:i:s', strtotime($close_time));
$close      = (int)str_replace(":", "", $close);
$now        = (int)date('Gis');
?>
<style type="text/css">
    .modal-dialog {
    margin: 85px auto;
}
.modal-header {
    border-bottom: 1px solid #FEB71F;
    background-color: #FEB71F;
}
.modal-body {
    border: 5px solid #FEB71F;
}
h4 {
    margin-top: 0px;
    margin-bottom: 0px;
}
</style>
<div class="container">
    <hr>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><?php echo $this->html->link('Restaurants', array('plugin'=>'', 'controller'=>'restaurants', 'action'=>'index')) ?></li>
        <li class="active"><?php echo($restaurant['Restaurant']['name']); ?></li>
    </ol>
    <?php
    echo $this->element('restarurant_block_detail', array ('restaurant' => $restaurant, 'viewDetails' => false));
    ?>

    <div class="row">
        <div class="col-sm-18">
            <div class="panel panel-myshop">
                <div class="panel-heading">
                    <span id="panel-tab-menu"> <a class="selected" href="javascript:void(0);">Menu </a> </span> 
                    <span id="panel-tab-reviews"> <a href="javascript:void(0);"> Reviews </a> </span> 
                    <span id="panel-tab-info"> <a href="javascript:void(0);"> Info </a> </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6" id="panel-menu-column">
                            <ul id="menu-list" style="background-color:#FFF;" class="nav nav-tabs restaurant-cuisine">
                                <?php
                                if (!empty($menus)) {
                                    foreach ($menus as $key => $menu) {
                                        ?>
                                        <li class="<?php echo empty($key) ? 'active' : ''; ?>"><a href="#<?php echo $menu['Menu']['id']; ?>" data-toggle="tab"><?php echo $menu['Menu']['name']; ?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-sm-17 col-sm-offset-1" id="panel-right-part">
                            <!-- Tab panes -->
                            <div class="tab-content" id="panel-menu-content">
                                <?php
                                if (!empty($menus)) {
                                    foreach ($menus as $key => $menu) {
                                        ?>
                                        <div class="tab-pane <?php echo empty($key) ? 'active' : ''; ?>" id="<?php echo $menu['Menu']['id']; ?>">
                                            <h3><?php echo $menu['Menu']['name']; ?></h3>
                                            <br>

                                            <table class="table table-responsive">

                                                <colgroup style="width: 35%"></colgroup>
                                                <colgroup style="width: 50%"></colgroup>
                                                <colgroup style="width: 15%;"></colgroup>
                                                <colgroup style="width: 10%"></colgroup>
                                                <?php
                                                if (!empty($menu['Food'])) {
                                                    foreach ($menu['Food'] as $food) {
																											
                                                        if(count($food['Additional']) > 0){
                                                                $_showMainFood = true;
                                                                foreach($food['Additional'] as $additionalFood){
                                                                        $item = $additionalFood;
																
                                                       ?>
                                                        <tr>
                                                            <td class="foodName">
                                                            <?php 
                                                               if($_showMainFood){
                                                               		echo empty($food['Food']['name'])?'No Name':$food['Food']['name'];
                                                               		$_showMainFood = false;
                                                               }
                                                               ?>
                                                            </td>
                                                            <td class="additionalFoodName">
                                                                <?php echo empty($item['name'])?'No name':$item['name']; ?>
                                                            </td>
                                                            <td class="txtrt foodPrice">
                                                            	<?php echo empty($item['price'])?0:$item['price']; ?>
                                                            </td>
                                                            
                                                            <?php if($now>$open && $now<$close):?>
                                                            
                                                            <td class="txtrt">
                                                                <button class="btn btn-success  btnAddToCurt" data-food-id="<?php echo $food['Food']['id']; ?>" min_order="<?php echo $restaurant['Restaurant']['min_order']; ?>" restaurant="<?php echo $restaurant['Restaurant']['id']; ?>" data-additionalfoodid="<?php echo $item['id']; ?>">+</button>
                                                            </td>
                                                            <?php else: ?>
                                                                <td>
                                                                    <button class="btn btn-success" data-toggle="modal" data-target="#timeModal">+</button>
                                                                </td>
                                                                <div class="modal fade" id="timeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button class="close" data-dismiss="modal">
                                                                                    <span aria-hidden="true" class="glyphicon glyphicon-remove-sign"></span>
                                                                                    <span class="sr-only">Close</span>
                                                                                </button>
                                                                                <h3 class='text-left'>
                                                                                    <?php echo($restaurant['Restaurant']['name']); ?>
                                                                                </h3>
                                                                            </div>
                                                                            <h4 class="modal-body text-left text-warning">
                                                                                Sorry we are unable take any order right now.
                                                                                <br/> <br>
                                                                                Please give your order between
                                                                                <span class='label label-info'><?php echo $open_time . " - " . $close_time ?></span>
                                                                                Current time :
                                                                                <span class="label label-danger"><?php echo date('h:i A', time()); ?></span>
                                                                                <br> <br>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </tr>
                                                        <?php
                                                        }
                                                        }else{
																$item = $food['Food'];
                                                        	?>
                                                        	                                                        <tr>
                                                            <td class="foodName">
                                                                <?php echo empty($item['name'])?'No name':$item['name']; ?>
                                                            </td>

                                                            <td>
                                                                &nbsp;
                                                            </td>

                                                            <td class="txtrt foodPrice">
                                                            	<?php echo empty($item['price'])?0:$item['price']; ?>
                                                            </td>

                                                            <?php if($now>$open && $now<$close):?>
                                                            
                                                            <td class="txtrt">
                                                                <button class="btn btn-success  btnAddToCurt" data-food-id="<?php echo $item['id']; ?>" min_order="<?php echo $restaurant['Restaurant']['min_order']; ?>" restaurant="<?php echo $restaurant['Restaurant']['id']; ?>">+</button>
                                                            </td>
                                                            <?php else: ?>
                                                                <td>
                                                                    <button class="btn btn-success" data-toggle="modal" data-target="#timeModal">+</button>
                                                                </td>
                                                                <div class="modal" id="timeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button class="close" data-dismiss="modal">
                                                                                    <span aria-hidden="true" class="glyphicon glyphicon-remove-sign"></span>
                                                                                    <span class="sr-only">Close</span>
                                                                                </button>
                                                                                <h3 class='text-left'>
                                                                                    <?php echo($restaurant['Restaurant']['name']); ?>
                                                                                </h3>
                                                                            </div>
                                                                            <h4 class="modal-body text-left text-warning">
                                                                                Sorry we are unable take any order right now.
                                                                                <br/> <br>
                                                                                Please give your order between
                                                                                <span class='label label-info'><?php echo $open_time . " - " . $close_time ?></span>
                                                                                Current time :
                                                                                <span class="label label-danger"><?php echo date('h:i A', time()); ?></span>
                                                                                <br> <br>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </tr>
                                                       <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>

                            </div>

                            <!-- Reviews -->

                            <div id="panel-reviews-content" style="display:none;">
                            <?php
                            // debug($restaurant);
                            ?>
                            <h3>Reviews of <?php echo($restaurant['Restaurant']['name']); ?></h3>
                            <table class="table table-hover">
                                <thead>
                                    <th>Date</th>
                                    <th>Name</th>                                   
                                    <th>Rating</th>
                                    <th>Comment</th>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($restaurant['Comment']))
                                {
                                    rsort($restaurant['Comment']);
                                    foreach($restaurant['Comment'] as $comment):
                                        ?>
                                        <tr>
                                            <td><?php echo $this->Time->nice($comment['created']); ?></td>
                                            <td><?php echo $comment['User']['first_name'] .' '. $comment['User']['last_name']; ?></td>                                
                                            <td>
                                                <table class="table table-hover">
                                                    <tr><td>Quality: <?php echo($comment['quality_rating']); ?></td></tr>
                                                    <tr><td>Delivery time: <?php echo($comment['delivery_time_rating']); ?></td></tr>
                                                    <tr><td>Service: <?php echo($comment['service_rating']); ?></td></tr>
                                                </table>
                                            </td>
                                            <td><?php echo($comment['comment']); ?></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                } else
                                {?>
                                <tr>
                                    <td colspan="4">
                                        <h4>No review found for <?php echo($restaurant['Restaurant']['name']); ?>.</h4>
                                    </td>
                                </tr>
                                <?php
                                }

                                ?>
                                </tbody>
                            </table>

                            </div>
                            <!-- / Reviews -->

                            <!-- Info -->
                            <div id="panel-info-content" class="col-md-24" style="display:none;">
                                <div class="col-md-8">
                                    <h4>Overview</h4>
                                    <div class="full-row mt10">
                                        <?php echo($restaurant['Restaurant']['promo_text']); ?>                                       
                                    </div>
                                    <div class="full-row mt10">
                                        <div class="info-overview-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="info-overview-details">
                                            <b class="full-row">Address</b>
                                            <span class="full-row"><?php echo($restaurant['Restaurant']['address']); ?></span>
                                        </div>
                                    </div>
                                    <div class="full-row mt10">
                                        <div class="info-overview-icon">
                                            <i class="fa fa-spoon"></i>
                                        </div>
                                        <div class="info-overview-details">
                                            <b class="full-row">Cuisines</b>
                                            <span class="full-row">
                                            <?php
                                                if (isset($restaurant['Cusine'])) {
                                                    $str_cusine = "";
                                                    foreach ($restaurant['Cusine'] as $cusine) {
                                                        $str_cusine .= $cusine['name'].", ";
                                                    }
                                                    $str_cusine = rtrim($str_cusine, ", ");
                                                    echo $str_cusine;
                                                }
                                            ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="full-row mt10">
                                        <div class="info-overview-icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="info-overview-details">
                                            <b class="full-row">Delivery Charge</b>
                                            <span class="full-row"><?php echo($restaurant['Restaurant']['delivery_charge']); ?></span>
                                        </div>
                                    </div>

                                    <div class="full-row mt10">
                                        <div class="info-overview-icon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </div>
                                        <div class="info-overview-details">
                                            <b class="full-row">Delivery Time</b>
                                            <span class="full-row"><?php echo($restaurant['Restaurant']['delivery_time']); ?></span>
                                        </div>
                                    </div>

                                    <div class="full-row mt20">
                                        <div class="full-row">
                                            <span>Close Day:</span> <span> <?php echo $restaurant['Restaurant']['store_close_day']; ?></span>
                                        </div>
                                        <div class="full-row">
                                            <span>Min Order:</span> <span> <?php echo $restaurant['Restaurant']['min_order']; ?></span> 
                                        </div>
                                        <div class="full-row">
                                            <span>Free Delivery Distance:</span> <span> <?php echo $restaurant['Restaurant']['free_delivery_amount']; ?></span>
                                        </div>
                                        <div class="full-row">
                                            <span>Free Delivery Distance:</span> <span> <?php echo $restaurant['Restaurant']['free_delivery_distance']; ?></span>
                                        </div>
                                    </div>

                                    <?php 
                                    if(isset($restaurant['Restaurant']['payment_type']))
                                    {
                                    ?>
                                    <div class="full-row mt10">
                                        <h4>Payment Type</h4>
                                    </div>
                                    <div class="full-row mt10">
                                        <?php echo $restaurant['Restaurant']['payment_type']; ?>
                                    </div>
                                    <?php 
                                    }
                                    ?>

                                </div>
                                <div class="col-md-8">

                                    <?php 
                                    if(isset($restaurant['RestaurentOpeningHours']))
                                    {
                                    ?>
                                    <div class="full-row">
                                        <h4>Opening Hours</h4>
                                        <div class="row mt10">
                                            <?php 
                                            foreach ($restaurant['RestaurentOpeningHours'] as $ophours) {
                                            ?>
                                            <div class="full-row mt10">
                                                <div class="col-md-7"><?php echo $ophours['operation_day'];?></div>
                                                <div class="col-md-5"><?php echo $ophours['operation_type'];?></div>
                                                <div class="col-md-12"><?php echo $ophours['open_hour'];?> - <?php echo $ophours['close_hour'];?></div>
                                            </div>
                                            <?php                                           
                                            }
                                            ?>
                                        </div>  
                                    </div>
                                    <?php                                          
                                     }
                                    ?>

                                    <?php 
                                    if(isset($restaurant['RestaurentDeliveryAreaFee']))
                                    {
                                    ?>
                                    <div class="full-row mt10">
                                        <h4>Delivery Area</h4>

                                        <div class="row mt10">

                                            <div class="full-row mt10">
                                                <div class="col-md-6"><b>Delivery Period</b></div>
                                                <div class="col-md-6"><b>Area</b></div>
                                                <div class="col-md-6"><b>Min Amt</b></div>
                                                <div class="col-md-6"><b>Fee</b></div>
                                            </div>
                                        <?php 
                                            foreach ($restaurant['RestaurentDeliveryAreaFee'] as $areafee) 
                                            {
                                        ?>
                                            <div class="full-row mt10">
                                                <div class="col-md-6"><?php echo $areafee['delivery_period'];?></div>
                                                <div class="col-md-6"><?php echo $areafee['delivery_post_code'];?></div>
                                                <div class="col-md-6"><?php echo $areafee['min_order_amount'];?></div>
                                                <div class="col-md-6"><?php echo $areafee['delivery_fee'];?></div>
                                            </div>
                                        <?php 
                                            }                                      
                                        ?>
                                        </div>
                                    </div>
                                    
                                    <?php                                           
                                    }
                                    ?>

                                </div>
                                <div class="col-md-8">
                                    <h4>Location</h4>
                                    <div class="full-row mt20">
                                        <?php 
                                        if(empty($restaurant['Restaurant']['lattitude']))
                                            $restaurant['Restaurant']['lattitude'] = 0;
                                        
                                        if(empty($restaurant['Restaurant']['longitude']))
                                            $restaurant['Restaurant']['longitude'] = 0;
                                        ?>
                                        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
                                        <script>
                                            function initialize() {

                                                var myLatlng = new google.maps.LatLng(<?php echo $restaurant['Restaurant']['lattitude']; ?>,<?php echo $restaurant['Restaurant']['longitude']; ?>);
                                                var mapOptions = {
                                                  zoom: 6,
                                                  center: myLatlng
                                                }
                                                var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
                                                var marker=new google.maps.Marker({position:myLatlng});

                                                var marker = new google.maps.Marker({
                                                    position: myLatlng,
                                                    map: map,
                                                });


                                            }

                                            google.maps.event.addDomListener(window, 'load', initialize);
                                        </script>
                                        <div id="googleMap" style="height:250px;"></div>

                                    </div>
                                </div>
                            </div>
                            <!-- Info -->

                        </div>
                    </div>
                    <!-- Nav tabs -->




                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="your-order">
            <?php
            echo $this->element('my_cart', array ('checkout' => true, 'addmore' => false));
            ?>
           </div>
        </div>
    </div>
</div>


<?php 
//echo "<pre>";
//print_r($restaurant);
//echo "</pre>";

?>

<style>
.order-fixed {position:fixed !important; top:83px; width:278px;}
.menu-fixed {position:fixed !important; top:86px; width:200px;}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        OrderObj.updateCart('display', '', '<?php echo $restaurant['Restaurant']['id']; ?>','<?php echo $restaurant['Restaurant']['min_order']; ?>');


        /*
        $(window).scroll(function(){
              if ($(this).scrollTop() > 250) {
                  $('#your-order').addClass('order-fixed');
                  $('#menu-list').addClass('menu-fixed');
              } else {
                  $('#your-order').removeClass('order-fixed');
                  $('#menu-list').removeClass('menu-fixed');
              }
          });
          */
	$("#panel-tab-menu").click(function(){
            $("#panel-menu-column").show();
            $("#panel-menu-content").show();
            $("#panel-reviews-content").hide();
            $("#panel-info-content").hide();
            

            $("#panel-right-part").removeClass("col-sm-23");
            $("#panel-right-part").addClass("col-sm-17");
            $("#panel-right-part").addClass("col-sm-offset-1");

    
            $("#panel-tab-reviews").children("a").removeClass("selected");
            $("#panel-tab-info").children("a").removeClass("selected");
            $(this).children("a").addClass("selected");
            
        });

        $("#panel-tab-reviews").click(function(){
            $("#panel-reviews-content").show();
            $("#panel-menu-content").hide();
            $("#panel-menu-column").hide();
            $("#panel-info-content").hide();

            $("#panel-right-part").removeClass("col-sm-17");
            $("#panel-right-part").removeClass("col-sm-offset-1");
            $("#panel-right-part").addClass("col-sm-23");

            $("#panel-tab-menu").children("a").removeClass("selected");
            $("#panel-tab-info").children("a").removeClass("selected");
            $(this).children("a").addClass("selected");
           
        });

        $("#panel-tab-info").click(function(){
            $("#panel-info-content").show();
            $("#panel-reviews-content").hide();
            $("#panel-menu-content").hide();
            $("#panel-menu-column").hide();

            $("#panel-right-part").removeClass("col-sm-17");
            $("#panel-right-part").removeClass("col-sm-offset-1");
            $("#panel-right-part").addClass("col-sm-23");

            $("#panel-tab-menu").children("a").removeClass("selected");
            $("#panel-tab-reviews").children("a").removeClass("selected");
            $(this).children("a").addClass("selected");
           
        });


    });
</script>





