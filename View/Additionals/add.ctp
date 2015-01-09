<div class="row">
    <?php echo $this->Form->create('Additional', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo __('Add Additional'); ?></legend>
        <?php
        	echo $this->Form->input ( 'restaurant_id', array ('div' => array ('class' => 'form-group col-md-6'),'onchange'=>'getMenuItemsForRestaurent(this.value)','empty' => '(Choose Restaurant)','class' => 'form-control') );
        	echo $this->Form->input ( 'menu_id', array ('div' => array ('class' => 'form-group col-md-6'),'empty' => '(Choose Menu)','class' => 'form-control','onchange'=>'getFoodItemsForMenu(this.value)') );
        	echo $this->Form->input('Food', array('div' => array('class' => 'form-group col-md-12'), 'class' => 'form-control'));
            echo $this->Form->input('name', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('price', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
           
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>
<script type="text/javascript">
function getMenuItemsForRestaurent(restaurent_id){
	 $.ajax({
        type: "post",
        url: '<?php echo $this->webroot;?>foods/getMenuItems',
        dataType: "json",
        data: {
            restaurent_id: restaurent_id,
        },
        success: function (result) {
           /* if (result != 0) {
               $("#AdditionalMenuId").empty();
               var options = "<option value='0'> --Select Menu-- </option>";
               $.each(result, function(i,v){
                   options+="<option value='"+v.id+"'>"+v.name+"</option>";
                   })
               $("#AdditionalMenuId").append(options);
            }
            else{
           	 	$("#AdditionalMenuId").empty();
                var options = "<option value='0'> --Select Menu-- </option>";
                $("#AdditionalMenuId").append(options);
                }*/
        	getDropDownList("AdditionalMenuId", result, "(Choose Menu)");
        },
        error: function () {

        }
    });
}

function getFoodItemsForMenu(menu_id){
	 $.ajax({
	        type: "post",
	        url: '<?php echo $this->webroot;?>foods/getFoodItemsForMenu',
	        dataType: "json",
	        data: {
	            menu_id: menu_id,
	        },
	        success: function (result) {
	            /*if (result != 0) {
	               $("#FoodFood").empty();
	               var options = "<option value='0'> --Select Food-- </option>";
	               $.each(result, function(i,v){
	                   options+="<option value='"+v.id+"'>"+v.name+"</option>";
	                   })
	               $("#FoodFood").append(options);
	            }
	            else{
	           	 	$("#FoodFood").empty();
	                var options = "<option value='0'> --Select Food-- </option>";
	                $("#FoodFood").append(options);
	                }*/
                getDropDownList("FoodFood", result, "");
	        },
	        error: function () {

	        }
	    });
}
function getDropDownList( id, optionList, noOptionText) {
	if(noOptionText.length > 0){
    	$('#'+id).html("<option value=''>" + noOptionText + "</option>");
	}
	else{
		$('#'+id).html("");
		}

    $.each(optionList, function (i, val) {

        $('#'+id).append("<option value="+val.id+">" + val.name + "</option>");
    });

}
</script>
