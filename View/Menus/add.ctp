
<style>
#MenuPostal.loading { background-color: red; }
</style>
<div class="row">
	<?php
		$restaurant = isset ( $restaurant ) ? $restaurant : "";
		$city = isset ( $city ) ? $city : "";
		$postal = isset ( $postal ) ? $postal : "";
	?>
    <?php echo $this->Form->create('Menu', array('type' => 'file')); ?>
    <fieldset>
		<div class="col-md-12">
			<legend><?php echo __('Add Menu'); ?></legend>
		</div>
        <?php
        
        echo $this->Form->input('city_id', array('type'=>'hidden'));
			
		echo $this->Form->input ( 'city', array (
				'div' => array (
						'class' => 'form-group col-md-6 ' 
				),
				'class' => 'form-control' ,'autofocus',
				'placeholder' => 'e.g. London N',
				'value'=>$city,
				'onkeydown'=>'removeCityValue();'
				
		) );

		echo $this->Form->input ( 'postal', array (
				'div' => array (
						'class' => 'form-group col-md-4' 
				),
				'class' => 'form-control' ,
				'placeholder'=>'e.g. HD6 EA',
'value'=>$postal
		) );
		
		?>
		<div class="form-group col-md-2 text-center">
		<button class="btn btn-info form-control" type="button" onclick="getRestaurantListByQuery()" style="margin-top: 22px;">Show Restaurant</button>
		</div>
		
		<?php
		echo $this->Form->input ( 'restaurant_id', array (
				'empty' => 'Select Restaurant',
				'div' => array (
						'class' => 'form-group col-md-12 ' 
				),
				'class' => 'form-control' ,
				'value'=>$restaurant
		) );
		
		?>
		
    </fieldset>
	<fieldset>
		<div id="Menu_variation"></div>
	</fieldset>
	<div class="form-group col-md-12">
		<button class="btn btn-lg btn-primary addNew" type="button"
			onclick="checkDuplicateName()">Add New</button>
	</div>
	<br>
	<div class="form-group col-md-12 text-center ">
		<button class="btn btn-lg btn-success saveButton" type="button" onclick="beforeSubmitCheck()">Save</button>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.4.13/jquery.timepicker.js"></script>
<script type="text/javascript">

	var menu_name_array = [];
		
	var cityId = "";
	
	var Menu_index = 0;

	function checkDuplicateName()
	{
		$('.addNew').prop('disabled', true);
		
		$('.saveButton').prop('disabled', true);
		
		var c_name = $("#MenuItem"+Menu_index+"Name").val();

		var error_flag = 0;
		
		$.each(menu_name_array, function(i,v)
		{
			if(c_name == v)
			{
				alert("Duplicate Menu !!!");
				error_flag = 1;
				return false;
			}
		});
		

		if(error_flag == 1)
		{
			$("#MenuItem"+Menu_index+"Name").val("");	
			return false;
		}
		

		var resId = $("#MenuRestaurantId").val();
		
		if(Menu_index == 0)
		{
			addMenuItem();
			return false;
		}
		
		info = [];
		info[0] = 'Menu';
		info[1] = 0;
		params = [];
		params[0] = 'name';
		params[1] = c_name;
		info[2] = params;

		p1 = [];
		p1[0] = 'restaurant_id';
		p1[1] = resId;
		info[3] = p1;
		
		$.ajax({
	        type: "post",
	        url: '<?php echo $this->webroot;?>menus/checkDuplicateMenu',
	        dataType: "json",
	        data: {'data':info},
	        success: function (result) {
	            if (result == 0) {
	            	addMenuItem();
	            }
	            else
	            {
	            	alert("Duplicate Menu");
	            	$("#MenuItem"+Menu_index+"Name").val("");
	            	$('.addNew').prop('disabled', true);
	            	$('.saveButton').prop('disabled', true);
	            }
	        },
	        error: function () {
				alert("Error Occurred");
				$('.addNew').prop('disabled', true);
				$('.saveButton').prop('disabled', true);
	        }
	    });
	}
	
	function addMenuItem()
	{
		$('.addNew').prop('disabled', true);
		$('.saveButton').prop('disabled', true);
		$(".button_remove_Menu").hide();
		Menu_index++;
		if(Menu_index > 1){
			menu_name_array[Menu_index - 2] = $("#MenuItem"+(Menu_index - 1)+"Name").val();
		}
		$("#button_Menu_remove_id_"+Menu_index).show();
		var Menu_items = '<div id="Menu_item_'+Menu_index+'" class="col-md-12"><div class="form-group col-md-4">';
		Menu_items+='<label for="MenuItem'+Menu_index+'Name">Name</label>';
		Menu_items+='<input id="MenuItem'+Menu_index+'Name" class="form-control" type="text" name="data[MenuItem]['+Menu_index+'][name]" required onkeyup="matchingValue(this.value)">';
		Menu_items+='</div>';
		Menu_items+='<div class="form-group col-md-6">';
		Menu_items+='<label for="MenuItem'+Menu_index+'Price">Description</label>';
		Menu_items+='<textarea rows="2" id="MenuItem'+Menu_index+'Price" class="form-control" type="text" name="data[MenuItem]['+Menu_index+'][description]" ></textarea>';
		Menu_items+='</div>'
		Menu_items+='<div class="form-group col-md-2 button_remove_Menu" id="button_Menu_remove_id_'+Menu_index+'" >';
		Menu_items+='<label for="MenuItem'+Menu_index+'Price">Action</label>';
		Menu_items+='<button id="'+Menu_index+'" onclick="removeMenuItem(this.id)" style="width:40px;" class="form-control" type="button"><i class="icon-remove"></button>';
		Menu_items+='</div></div>';
        $("#Menu_variation").append(Menu_items);
        document.getElementById('MenuItem'+Menu_index+'Name').focus();

	}

	function matchingValue(id)
	{
		if(id.length > 0)
		{
			$('.addNew').prop('disabled', false);
			$('.saveButton').prop('disabled', false);
		}
		else
		{
			$('.addNew').prop('disabled', true);
			$('.saveButton').prop('disabled', true);
		}
	}

	function removeMenuItem(selected_Menu_index)
	{	
		menu_name_array.pop();
		$("#Menu_item_"+selected_Menu_index).remove();
		Menu_index--;
		$("#button_Menu_remove_id_"+Menu_index).show();
		$('.addNew').prop('disabled', false);
		$('.saveButton').prop('disabled', false);
	}
</script>
<script>
/**
 * Autocomplete by postcode
 */
$('#MenuPostal').autocomplete({
    serviceUrl: '<?php echo $this->webroot;?>restaurants/getPostCodeListAutoComplete',
    minChars:3,
    onSearchStart: function (query) {$(this).addClass("wait");},
    onSearchComplete: function (query, suggestions) {$(this).removeClass("wait");},
    onSelect:function(suggestion){
    	$('#MenuPostal').removeClass('focusClass');
    },

});



/**
 * Autocomplete by City
 */

$('#MenuCity').autocomplete({
    serviceUrl: '<?php echo $this->webroot;?>restaurants/getCityListAutoComplete',
    minChars:3,
    onSearchStart: function (query) {$(this).addClass("wait");$("#MenuCityId").val("");},
    onSearchComplete: function (query, suggestions) {$(this).removeClass("wait");},
    onSelect:function(suggestion){
    	$("#MenuCityId").val(suggestion["data"]);
    	$('#MenuCity').removeClass('focusClass');
    },
});


function getRestaurantListByQuery(){
	var postal = $("#MenuPostal").val();
	$.ajax({
        type: "post",
        url: '<?php echo $this->webroot;?>menus/getRestaurantListByQuery',
        dataType: "json",
        data: {
            postal: postal,
            city:$("#MenuCityId").val(),
        },
        success: function (result) {
            if (result == 0) {
            	clearDropDownList("MenuRestaurantId", "---- Restaurant Unavailable ----");
            }
            else
            {
            	makeDropDownList("MenuRestaurantId", result, "--Select Restaurant--");
            }
        },
        error: function () {

        }
    });
}

/**
 *  Other function
 */

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

window.onload = function(){
	$('.language').css('display','none');
}

$(function(){
	$('.saveButton').prop('disabled', true);
});

function beforeSubmitCheck()
{
	menu_name_array[Menu_index - 1] = $("#MenuItem"+(Menu_index)+"Name").val();

	var error_flag = 0;

	var result = [];
	
	$.each(menu_name_array, function(i, e) {
	    if ($.inArray(e, result) == -1)
		{ 
			result.push(e);
		}
	    else
	    {
	    	alert("Duplicate Menu !!!");
			error_flag = 1;
			return false;
		} 
	  });

	if(error_flag == 1)
	{
		$("#MenuItem"+Menu_index+"Name").val("");
		
		$('.addNew').prop('disabled', true);
		
		$('.saveButton').prop('disabled', true);

		menu_name_array.pop();
			
		return false;
	}
	
	var resId = $("#MenuRestaurantId").val();
	if(resId == "")
	{
		alert("Please Select a Restaurant first");
		return false;
	}

	if(Menu_index == 0)
	{
		alert("Please add at least one menu item");
		return false;
	}
	info = [];
	info[0] = 'Menu';
	info[1] = 0;
	params = [];
	params[0] = 'name';
	params[1] = $("#MenuItem"+Menu_index+"Name").val();
	info[2] = params;

	p1 = [];
	p1[0] = 'restaurant_id';
	p1[1] = resId;
	info[3] = p1;
	
	$.ajax({
        type: "post",
        url: '<?php echo $this->webroot;?>menus/checkDuplicateMenu',
        dataType: "json",
        data: {'data':info},
        success: function (result) {
            if (result == 0) {
                
            	$("#MenuAddForm").submit();
            }
            else
            {
            	alert("Duplicate Menu");
            	$("#MenuItem"+Menu_index+"Name").val("");
            	$('.addNew').prop('disabled', true);
            	$('.saveButton').prop('disabled', true);
            }
        },
        error: function () {
			alert("Error Occurred");
			$('.addNew').prop('disabled', true);
			$('.saveButton').prop('disabled', true);
        }
    });
} 

function removeCityValue()
{
	$("#MenuCityId").val("");
}
</script>



