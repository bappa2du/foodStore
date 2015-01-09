
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<i class="icon-table"></i> <?php echo __('Restaurant'); ?> </h2>
	</div>
	<table class="table table-striped">
		<tr>
			<td colspan="1">
            <?php
												
			if (strlen ( trim ( $restaurant ['Restaurant'] ['photo_dir'] ) ) > 0) {
				echo $this->Html->image ( '/files/restaurant/photo/' . $restaurant ['Restaurant'] ['id'] . '/' . $restaurant ['Restaurant'] ['photo'] );
			} else {
				// echo "<div class='alert alert-success'>No files available</div>";
			}
			?>
            &nbsp;
        </td>
			<td colspan="4">
            <?php echo "<span style='font-size:25px;color:#65b688;'>".h($restaurant['Restaurant']['name'])."</span>"; ?><br />
            <?php echo "<span style='color:#4fa2c2;font-weight:bold'>".h($restaurant['Restaurant']['promo_text'])."</span>"; ?><br>
            <?php echo "<span style='color:grey;font-size:12px;font-weight:bold'>".h($restaurant['Restaurant']['address'])."</span>"; ?>
            &nbsp;
        </td>


		</tr>
		<tr>
			<td colspan="1"><?php echo __('<strong>Phone</strong></'); ?></td>
			<td colspan="1"><?php echo __('<strong>Mobile</strong></'); ?></td>
			<td colspan="1"><?php echo __('<strong>Email</strong></'); ?></td>
			<td colspan="1"><?php echo __('<strong>Website</strong></'); ?></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td colspan="1">
            <?php echo h($restaurant['Restaurant']['phone']); ?>
            &nbsp;
        </td>
			<td colspan="1">
            <?php echo h($restaurant['Restaurant']['mobile']); ?>
            &nbsp;
        </td>
			<td colspan="1">
            <?php echo h($restaurant['Restaurant']['email']); ?>
            &nbsp;
        </td>
			<td colspan="1">
            <?php echo h($restaurant['Restaurant']['website']); ?>
            &nbsp;
        </td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo __('<strong>Country</strong>'); ?></td>
			<td><?php echo __('<strong>City</strong>'); ?></td>
			<td><?php echo __('<strong>Area</strong>'); ?></td>
			<td><?php echo __('<strong>Postal</strong>'); ?></td>
			<td><?php echo __('<strong>Lattitude</strong></'); ?></td>
			<td><?php echo __('<strong>Longitude</strong></'); ?></td>
		</tr>

		<tr>
			<td>
            <?php echo $this->Html->link($restaurant['Country']['name'], array('controller' => 'countries', 'action' => 'view', $restaurant['Country']['id'])); ?>
            &nbsp;
        </td>
			<td>
            <?php echo $this->Html->link($restaurant['City']['name'], array('controller' => 'cities', 'action' => 'view', $restaurant['City']['id'])); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['area']); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['postal']); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['lattitude']); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['longitude']); ?>
            &nbsp;
        </td>
		</tr>

		<tr>
			<td><?php echo __('<strong>Min Order</strong>'); ?></td>
			<td><?php echo __('<strong>Delivery Type</strong>'); ?></td>
			<td><?php echo __('<strong>Delivery Time</strong>'); ?></td>
			<td><?php echo __('<strong>Delivery Charge</strong></'); ?></td>
			<td><?php echo __('<strong>Delivery Amount</strong></'); ?></td>
			<td><?php echo __('<strong>Free Delivery Amount</strong></'); ?></td>
		</tr>

		<tr>
			<td>
            <?php echo h($restaurant['Restaurant']['min_order']); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['delivery_type']); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['delivery_time']); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['delivery_charge']); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['delivery_amount']); ?>
            &nbsp;
        </td>
			<td>
            <?php echo h($restaurant['Restaurant']['free_delivery_amount']); ?>
            &nbsp;
        </td>
		</tr>

		<tr>
			<td colspan="2"><?php echo __('<strong>Payment Type</strong></'); ?></td>
			<td colspan="1"><?php echo __('<strong>Open Time</strong></'); ?></td>
			<td colspan="1"><?php echo __('<strong>Close Time</strong></'); ?></td>
			<td colspan="2"><?php echo __('<strong>Store Close Day</strong></'); ?></td>
		</tr>
		<tr>
			<td colspan="2">
            <?php echo h($restaurant['Restaurant']['payment_type']); ?>
            &nbsp;
        </td>
			<td colspan="1">
            <?php echo h($restaurant['Restaurant']['open_time']); ?>
            &nbsp;
        </td>
			<td colspan="1">
            <?php echo h($restaurant['Restaurant']['close_time']); ?>
            &nbsp;
        </td>
			<td colspan="2">
            <?php echo h($restaurant['Restaurant']['store_close_day']); ?>
            &nbsp;
        </td>
		</tr>

		<tr>
			<td colspan="2"><?php echo __('<strong>Discount</strong></'); ?></td>
			<td colspan="2"><?php echo __('<strong>Discount Start</strong></'); ?></td>
			<td colspan="2"><?php echo __('<strong>Discount End</strong></'); ?></td>
		</tr>

		<tr>
			<td colspan="2">
            <?php echo h($restaurant['Restaurant']['discount']); ?>
            &nbsp;
        </td>
			<td colspan="2">
            <?php echo h($restaurant['Restaurant']['discount_start']); ?>
            &nbsp;
        </td>
			<td colspan="2">
            <?php echo h($restaurant['Restaurant']['discount_end']); ?>
            &nbsp;
        </td>
		</tr>

	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Menus'); ?></h3>
	<div>
		<div class="text-right">
			<a data-toggle="modal" data-target="#new_menu"
				class="text-right btn btn-warning"> <span class="icon-plus"></span>&nbsp;Add
				New
			</a>
		</div>
		<div class="modal" id="new_menu" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Menu</h4>
					</div>
					<div class="modal-body" style="padding: 15px">
						<form class="form-horizontal" method="post" id="food_menu"
							action="<?php echo $this->webroot;?>restaurants/add_menu/<?php echo $restaurant['Restaurant']['id'];?>">
							<input type="hidden" name="restaurant_id"
								value="<?php echo $restaurant['Restaurant']['id'] ?>" />

							<div class="col-sm-offset-2 col-sm-8">
                                <?php echo $this->Form->input('name', array('div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>'','required'=>'required')); ?>
                            </div>
							<div class="col-sm-offset-2 col-sm-8">
                                <?php echo $this->Form->input('description', array('div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>'')); ?>
                            </div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
							</div>

                        <?php echo $this->Form->end(); ?>
                                    
					
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php if(!empty($restaurant['Menu'])): ?>

        <table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th style="width: 200px"><?php echo __('Name'); ?></th>
				<th><?php echo __('Description'); ?></th>
				<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
            <?php foreach($restaurant['Menu'] as $menu): ?>
                <tr>
				<td><?php echo $menu['name']; ?></td>
				<td><?php echo $menu['description']; ?></td>
				<td class="actions">
					<!--                        -->
					<?php //echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'menus', 'action' => 'view', $menu['id']), array('escape' => false)); ?>
<!--                        &nbsp;|&nbsp;--> <a data-toggle="modal"
					data-target="#<?php
						
						echo $menu ['id'];
						?>"> <span class="icon-pencil"></span>
				</a> &nbsp;|&nbsp;
					<div class="modal" id="<?php echo $menu['id']; ?>" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel"><?php echo $menu['name']; ?></h4>
								</div>
								<div class="modal-body" style="padding: 15px">
									<form class="form-horizontal" method="post"
										id="<?php echo $menu['id']; ?>"
										action="<?php echo $this->webroot;?>restaurants/updateRestaurantMenuItem/<?php echo $menu['id']; ?>">
										<input type="hidden" name="restaurant_id"
											value="<?php echo $menu['restaurant_id'] ?>" />

										<div class="col-sm-offset-2 col-sm-8">
                                                <?php echo $this->Form->input('name', array('div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>$menu['name'],'required'=>'required')); ?>
                                            </div>


										<div class="col-sm-offset-2 col-sm-8">
                                                <?php echo $this->Form->input('description', array('div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>$menu['description'])); ?>
                                            </div>


										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-8">
												<button type="submit" class="btn btn-primary">Update</button>
											</div>
										</div>

                                            <?php echo $this->Form->end(); ?>
 
								
								</div>
							</div>
						</div>
					</div>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'restaurants', 'action' => 'deleteRestaurantMenuItem', $menu['id'],$menu['restaurant_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $menu['id'])); ?>
                    </td>
			</tr>
            <?php endforeach; ?>
            </tbody>
	</table>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
<br>
<div class="related">
	<h3><?php echo __('Related Foods'); ?></h3>
	<div>
		<div class="text-right">
			<a data-toggle="modal" data-target="#new_food"
				class="text-right btn btn-warning"> <span class="icon-plus"></span>&nbsp;Add
				New
			</a>
		</div>
		<div class="modal" id="new_food" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Food</h4>
					</div>
					<div class="modal-body" style="padding: 15px">
						<form class="form-horizontal" method="post" id="food_item"
							action="<?php echo $this->webroot;?>restaurants/add_food/<?php echo $restaurant['Restaurant']['id'];?>">
							<input type="hidden" name="restaurant_id"
								value="<?php echo $restaurant['Restaurant']['id'] ?>" />
							<div class="col-sm-offset-2 col-sm-8">
                                                <?php echo $this->Form->input('menu_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control','value'=>'','required'=>'required', 'empty'=>'--Select Menu--')); ?>
                                            </div>
							
							<div class="col-sm-offset-2 col-sm-8">
                                                <?php echo $this->Form->input('name', array('id'=>'f_name','div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>'','required'=>'required')); ?>
                                            </div>
							<div class="col-sm-offset-2 col-sm-8">
                                                <?php echo $this->Form->input('description', array('id'=>'f_description','div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>'')); ?>
                                            </div>
							<div class="col-sm-offset-2 col-sm-8">
                                                <?php echo $this->Form->input('price', array('id'=>'f_price','div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>'','required'=>'required')); ?>
                                            </div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
									<button type="button" class="btn btn-primary"
										onclick="submitFoodForm()">Save</button>
								</div>
							</div>

                            <?php echo $this->Form->end(); ?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php if(!empty($foods)): ?>
        <table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th><?php echo __('Menu'); ?></th>
				<th style="width: 200px"><?php echo __('Name'); ?></th>
				<th><?php echo __('Description'); ?></th>
				<th><?php echo __('Variation'); ?></th>
				<th><?php echo __('Price'); ?></th>
				<th class="actions" style="width: 80px"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
            <?php
            $p_food = 0; 
            $p_menu = 0;
            foreach($foods as $food):
            ?>
                <tr>
                 <td><?php
                	if($p_menu !== $food[0]['menu_name']){
                		echo $food[0]['menu_name'];
					}
                	?> </td>
				<td>
					<?php if($p_food != $food[0]['id']){?>
					<a data-toggle="modal" title="Add Food Variation for <?php echo $food[0]['name']; ?>"
					data-target="#variation-<?php
						echo $food [0] ['id'];
						?>"> <span class="icon-plus"></span>
				</a>&nbsp;|&nbsp;<?php echo $food[0]['name']; ?> 
					<div class="modal" id="variation-<?php
						echo $food [0] ['id'];
						?>" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">Add Food Variation</h4>
								</div>
								<div class="modal-body" style="padding: 15px">
									<form class="form-horizontal" method="post" id="food_item_variation_<?php echo $food [0] ['id'];?>"
										action="<?php echo $this->webroot;?>restaurants/add_food_variation/<?php echo $restaurant['Restaurant']['id'];?>">
										<input type="hidden" name="variation[restaurant_id]"
											value="<?php echo $food [0] ['restaurant_id'] ?>" />
										<input type="hidden" name="variation[menu_id]"
											value="<?php echo $food [0] ['menu_id'] ?>" />
										<input type="hidden" name="variation[food_id]"
											value="<?php echo $food [0] ['id'] ?>" />
										<div class="col-sm-offset-2 col-sm-8">
                                                <?php echo $this->Form->input('variation.name', array('id'=>'v_name_'.$food [0] ['id'],'div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>'','required'=>'required')); ?>
                                            </div>
										<div class="col-sm-offset-2 col-sm-8">
                                                <?php echo $this->Form->input('variation.price', array('id'=>'v_price_'.$food [0] ['id'],'div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>'','required'=>'required')); ?>
                                            </div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-8">
												<button type="button" class="btn btn-primary"
													onclick="submitFoodVariationForm('<?php echo $food [0] ['id'];?>')">Save</button>
											</div>
										</div>
                                    <?php echo $this->Form->end(); ?>
                                    <script type="text/javascript">
                                    function isNumber(n){
										  return (parseFloat(n) == n);
										}
										var id = '<?php echo $food [0] ['id'];?>';
									    $("#"+'v_price_'+id).keyup(function(event){
									        var input = $(this).val();
									        if(!isNumber(input)){
									            alert("Sorry, invalid price.");
									            $(this).val(input.substring(0, input .length-1));
									        }
									    });
                                    </script>
								</div>
							</div>
						</div>
					</div>
					<?php
					$p_food = $food[0]['id'];
           			 }
           			 ?>
				</td>
				<td><?php echo $food[0]['description']; ?></td>
				<td><?php echo $food[0]['variation_name']; ?></td>
				<td style="width: 80px"><?php echo $food[0]['price']; ?></td>
				<td class="actions" style="width: 80px">
					<a data-toggle="modal"
					data-target="#food_<?php
						echo $food [0] ['id'];
						?>_variation_<?php echo $food [0] ['adf_id'];?>"> <span class="icon-pencil"></span>
				</a>
					<div class="modal" id="food_<?php
						echo $food [0] ['id'];
						?>_variation_<?php echo $food [0] ['adf_id'];?>" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel"><?php echo $food[0]['name']; ?></h4>
								</div>
								<div class="modal-body" style="padding: 15px">
									<form class="form-horizontal" method="post"
										id="<?php echo $food[0]['id']."#".$food[0]['adf_id']; ?>"
										action="<?php echo $this->webroot;?>restaurants/updateRestaurantFoodItem/<?php echo $food[0]['id']; ?>/<?php echo $food[0]['adf_id'];?>">
										<input type="hidden" name="restaurant_id"
											value="<?php echo $food[0]['restaurant_id'] ?>" />

										<div class="col-sm-offset-2 col-sm-8">
                                                    <?php echo $this->Form->input('name', array('div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>$food[0]['name'],'required'=>'required')); ?>
                                                </div>


										<div class="col-sm-offset-2 col-sm-8">
                                                    <?php echo $this->Form->input('description', array('div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>$food[0]['description'])); ?>
                                                </div>
                                                
                                                <?php if($food[0]['type'] == 2){?>
 													<div class="col-sm-offset-2 col-sm-8">
                                                    	<?php echo $this->Form->input('variation', array('div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>$food[0]['variation_name'],'required'=>'required')); ?>
                                                	</div>
												<?php }?>
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <?php echo $this->Form->input('price', array('div' => array('class' => 'form-group'), 'type' => 'text', 'class' => 'form-control','value'=>$food[0]['price'],'required'=>'required')); ?>
                                                </div>

										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-8">
												<button type="submit" class="btn btn-primary">Update</button>
											</div>
										</div>
                                        <?php echo $this->Form->end(); ?>
								</div>
							</div>
						</div>
					</div>
                        &nbsp;|&nbsp;
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'restaurants', 'action' => 'deleteRestaurantFoodItem', $food[0]['id'],$restaurant['Restaurant']['id'],$food[0]['adf_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $food[0]['id'])); ?>
                    </td>
			</tr>
            <?php 
            $p_menu = $food[0]['menu_name'];
            endforeach; ?>
            </tbody>
	</table>
    <?php endif; ?>

    <!--<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
		</ul>
	</div>-->
</div>
<br>

<!-- <div class="related">
    <h3><?php echo __('Related Offers'); ?></h3>
    <?php if(!empty($restaurant['Offer'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions" style="width: 130px"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($restaurant['Offer'] as $offer): ?>
                <tr>
                    <td><?php echo $offer['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'offers', 'action' => 'view', $offer['id']), array('escape' => false)); ?>

                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'offers', 'action' => 'edit', $offer['id']), array('escape' => false)); ?>

                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'offers', 'action' => 'delete', $offer['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $offer['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?> -->

<!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Offer'), array('controller' => 'offers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
<!-- </div> -->
<!-- <div class="related">
    <h3><?php echo __('Related Packages'); ?></h3>
    <?php if(!empty($restaurant['Package'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions" style="width: 130px"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($restaurant['Package'] as $package): ?>
                <tr>
                    <td><?php echo $package['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'packages', 'action' => 'view', $package['id']), array('escape' => false)); ?>

                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'packages', 'action' => 'edit', $package['id']), array('escape' => false)); ?>

                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'packages', 'action' => 'delete', $package['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $package['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?> -->

<!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
<!-- </div> -->

<!-- <div class="related">
    <h3><?php echo __('Related Comments'); ?></h3>
    <?php if(!empty($restaurant['Comment'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Comment'); ?></th>
                <th class="actions" style="width: 130px"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($restaurant['Comment'] as $comment): ?>
                <tr>
                    <td><?php echo $comment['comment']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'comments', 'action' => 'view', $comment['id']), array('escape' => false)); ?>

                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'comments', 'action' => 'edit', $comment['id']), array('escape' => false)); ?>

                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No data available</div>
    <?php endif; ?> -->

<!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
<!-- </div>
<div class="related">
    <h3><?php echo __('Related Pointvalues'); ?></h3>
    <?php if(!empty($restaurant['Pointvalue'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($restaurant['Pointvalue'] as $pointvalue): ?>
                <tr>
                    <td><?php echo $pointvalue['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'pointvalues', 'action' => 'view', $pointvalue['id']), array('escape' => false)); ?>

                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'pointvalues', 'action' => 'edit', $pointvalue['id']), array('escape' => false)); ?>

                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'pointvalues', 'action' => 'delete', $pointvalue['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pointvalue['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?> -->

<!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pointvalue'), array('controller' => 'pointvalues', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
<!-- </div> -->

<script>
    	function submitFoodForm()
    	{ 
        	if(!$("#menu_id").val())
        	{
            	alert("Please select a menu first.");
        	}
        	else if(!$("#f_name").val())
            {
        		alert("Invalid Food Name");
            }
        	else if(!$("#f_price").val()){
        		alert("Invalid Food Price");
            }
        	else
            {
        		info = [];
        		info[0] = 'Food';
        		info[1] = 0;

        		params = [];
        		params[0] = 'name';
        		params[1] = $("#f_name").val();
        		info[2] = params;
        		
				res = [];
				res[0] = 'restaurant_id';
				res[1] =  '<?php $restaurant ['Restaurant'] ['id']?>';
				info[3] = res;

				menu = [];
				menu[0] = 'menu_id';
				menu[1] = $("#menu_id").val();
				info[4] = menu;
        		
        		$.ajax({
        	        type: "post",
        	        url: '<?php echo $this->webroot;?>foods/checkDuplicateFood',
        	        dataType: "json",
        	        data: {'data':info},
        	        success: function (result) {
        	            if (result == 0) 
            	        {
        	            	//$("#food_item").submit();
        	            }
        	            else
        	            {
        	            	alert("Duplicate Food Name");
        	            	$("#f_name").val("");
        	            }
        	        },
        	        error: function () {
        				alert("Error Occurred");
        	        }
        	    });
            	}
        }

        function submitFoodVariationForm(food_id)
        {
           if(!$("#v_name_"+food_id).val())
            {
        		alert("Invalid Name");
            }
        	else if(!$("#v_price_"+food_id).val())
            {
        		alert("Invalid Price");
            }
        	else{
        		$("#food_item_variation_"+food_id).submit();
            	}
        }
        
        function isNumber(n){
		  return (parseFloat(n) == n);
		}

	    $("#f_price").keyup(function(event){
	        var input = $(this).val();
	        if(!isNumber(input)){
	            $(this).val(input.substring(0, input .length-1));
	        }
	    });
	    $("#price").keyup(function(event){
	        var input = $(this).val();
	        if(!isNumber(input)){
	            $(this).val(input.substring(0, input .length-1));
	        }
	    });
    </script>
