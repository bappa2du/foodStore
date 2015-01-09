
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Restaurants'); ?></h6></div>
    <div class="datatable">
	
	 <table class="table table-bordered table-hover">
     <thead>
	<tr>			
			<th><?php echo $this->Paginator->sort('name'); ?></th>	
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_id'); ?></th>						
			<th><?php echo $this->Paginator->sort('postcode'); ?></th>						
			<th><?php echo $this->Paginator->sort('phone'); ?></th>			
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
     </thead>
            <tbody id="restaurantList">
	<?php foreach ($restaurants as $restaurant): ?>
	<tr>
		<td><?php echo h($restaurant['Restaurant']['name']); ?>&nbsp;</td>		
		<td>
			<?php echo $this->Html->link($restaurant['Country']['name'], array('controller' => 'countries', 'action' => 'view', $restaurant['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($restaurant['City']['name'], array('controller' => 'cities', 'action' => 'view', $restaurant['City']['id'])); ?>
		</td>		
		<td><?php echo h($restaurant['Restaurant']['postal']); ?>&nbsp;</td>		
		<td><?php echo h($restaurant['Restaurant']['phone']); ?>&nbsp;</td>		
		<td><?php echo h($restaurant['Restaurant']['email']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['website']); ?>&nbsp;</td>		
		<td class="actions">
			<?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $restaurant['Restaurant']['id']), array('escape'=>false)); ?>
			<?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $restaurant['Restaurant']['id']), array('escape'=>false)); ?>
			<?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $restaurant['Restaurant']['id']), array('escape'=>false), __('Are you sure you want to delete # %s?', $restaurant['Restaurant']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </tbody>
	</table>
	
</div>
</div>
<style>
.autocomplete-suggestions {
	border: 1px solid #999;
	background: #FFF;
	overflow: auto;
}

.autocomplete-suggestion {
	padding: 2px 5px;
	white-space: nowrap;
	overflow: hidden;
}

.autocomplete-selected {
	background: #F0F0F0;
}

.autocomplete-suggestions strong {
	font-weight: normal;
	color: #3399FF;
}

.autocomplete-group {
	padding: 2px 5px;
}

.autocomplete-group strong {
	display: block;
	border-bottom: 1px solid #000;
}
.wait {
	    background: url("/716.GIF") no-repeat top right;
	}
.focusClass{
	border-color:red;
	box-shadow:0px 0px 1px red;
	color:red;
}
.focusClassOut{
	border-color:green;
	box-shadow:0px 0px 1px green;
	color:green;
}
</style>

<script type="text/javascript">
window.onload = function()
{
	$('.dataTables_filter input[type="text"]').attr('placeholder','By Name or City or Postcode or Anything');
	$('.dataTables_filter input[type="text"]').css('width','350px');
}
</script>