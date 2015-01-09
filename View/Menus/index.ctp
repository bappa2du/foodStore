<div class="genei_search_panel">
<?php
	$restaurant = isset ( $restaurant ) ? $restaurant : "";
	$city = isset ( $city ) ? $city : "";
	$postal = isset ( $postal ) ? $postal : "";
	?>
	<div class="row">
		<?php
		echo $this->Form->input ( 'city', array (
				'div' => array (
						'class' => 'form-group col-md-6 ' 
				),
				'class' => 'form-control' ,'autofocus',
				'placeholder' => 'kewword e.g. London N',
				'value' => $city 
			) );

		echo $this->Form->input ( 'postal', array (
				'div' => array (
						'class' => 'form-group col-md-6 ' 
				),
				'class' => 'form-control' ,'autofocus',
				'placeholder'=>'keyword e.g. HD1 1EA',
				'value' => $postal
		) );
		
		?>
		<?php
		echo $this->Form->input ( 'restaurant_id', array (
				'empty' => 'Select Restaurant',
				'div' => array (
						'class' => 'form-group col-md-12 ' 
				),
				'selected' => $restaurant,
				'onchange' => 'loadDataForSelectedRestaurant()',
				'class' => 'form-control',
				'value' => $restaurant, 
		) );
		
		?>
		</div>

</div>
<div class="panel panel-default">

	<div class="panel-heading">
		<h6 class="panel-title">
			<i class="icon-table"></i><?php echo __('Menus'); ?></h6>
	</div>

	<div class="datatable">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th class="actions" style="width:120px"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
            <?php foreach($menus as $menu): ?>
                <tr>
					<td><?php echo h($menu['Menu']['name']); ?>&nbsp;</td>
					<td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $menu['Menu']['id']), array('escape' => false)); ?>
                        &nbsp;|&nbsp;
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $menu['Menu']['id']), array('escape' => false)); ?>
                        &nbsp;|&nbsp;
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $menu['Menu']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $menu['Menu']['name'])); ?>
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
<script>

$('#postal').autocomplete({
    serviceUrl: '<?php echo $this->webroot;?>restaurants/getPostCodeListAutoComplete',
    minChars:3,
    onSearchStart: function (query) {$(this).addClass("wait");},
    onSearchComplete: function (query, suggestions) {$(this).removeClass("wait");},
    onSelect: function (suggestion) {
    	getRestaurantListByPostCode($("#postal").val());
    }
});

$( "#postal" ).blur(function() {
	var postal = this.value;
	if(postal !='')
	{
		$.ajax({
	        type: "post",
	        url: '<?php echo $this->webroot;?>menus/getBlurPostCodeResponse',
	        dataType: "json",
	        data: {
	            postal: postal,
	        },
	        success: function (result) {
	            if (result == 0) {
	            	$('#postal').focus();
	            	$('#postal').addClass('focusClass');
	            	
	            }else if(result ==1){
	            	$('#postal').removeClass('focusClass');
	            }
	        },
	        error: function () {
	        }
	    });
	}
	else
	{
		$('#postal').removeClass('focusClass');
	}

});

function makeDropDownList(table_id, drop_down_data, no_option_text){
	$("#"+table_id).empty();
	var options = "<option value=''>"+no_option_text+"</option>";
    $.each(drop_down_data, function(i,v){
        options+="<option value='"+v.id+"'>"+v.name+"</option>";
        })
    $("#"+table_id).append(options);
}

function clearDropDownList(table_id,no_option_text){
	$("#"+table_id).empty();
	var options = "<option value=''>"+no_option_text+"</option>";
    $("#"+table_id).append(options);
}

function getRestaurantListByPostCode(postal){
	$.ajax({
        type: "post",
        url: '<?php echo $this->webroot;?>menus/getRestaurantListByPostCode',
        dataType: "json",
        data: {
            postal: postal,
        },
        success: function (result) {
            if (result == 0) {
            	clearDropDownList("restaurant_id", "---- Restaurant Unavailable ----");
            }
            else
            {
            	makeDropDownList("restaurant_id", result, "--Select Restaurant--");
            }
        },
        error: function () {

        }
    });
}

function loadDataForSelectedRestaurant(){
	var val = $("#restaurant_id").val();
	if(val != ""){
		window.location = '<?php echo $this->webroot;?>menus?restaurant_id='+val;
		}
}
/**
 * For City search
 */

$('#city').autocomplete({
serviceUrl: '<?php echo $this->webroot;?>restaurants/getCityListAutoComplete',
minChars:3,
onSearchStart: function (query) {$(this).addClass("wait");},
onSearchComplete: function (query, suggestions) {$(this).removeClass("wait");},
onSelect:function(suggestion){
var city=suggestion["data"];
$('#city').removeClass('focusClass');
getRestaurantListByCity(city);},
});

function getRestaurantListByCity(city){
	$.ajax({
        type: "post",
        url: '<?php echo $this->webroot;?>menus/getRestaurantListByCity',
        dataType: "json",
        data: {
            city: city,
        },
        success: function (result) {
            if (result == 0) {
            	clearDropDownList("restaurant_id", "---- Restaurant Unavailable ----");
            }
            else
            {
            	makeDropDownList("restaurant_id", result, "--Select Restaurant--");
            }
        },
        error: function () {

        }
    });
}
$( "#city" ).blur(function() {
			var city = this.value;
			if(city !='')
			{
				$.ajax({
			        type: "post",
			        url: '<?php echo $this->webroot;?>menus/getBlurCityResponse',
			        dataType: "json",
			        data: {
			            city: city,
			        },
			        success: function (result) {
			            if (result == 0) {
			            	$('#city').focus();
			            	$('#city').addClass('focusClass');
			            	
			            }else if(result ==1){
			            	$('#city').removeClass('focusClass');
			            }
			        },
			        error: function () {
			        }
			    });
			}
			else
			{
				$('#city').removeClass('focusClass');
			}

		});
</script>