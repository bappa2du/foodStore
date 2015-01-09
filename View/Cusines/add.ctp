<div class="row">
    <?php echo $this->Form->create('Cusine',array('type'=>'file')); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Add Food Category'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('name', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));

            echo $this->Form->input('image', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'file', 'class' => ''));
            
            echo $this->Form->input('image_dir', array('type' => 'hidden'));
        ?>
    </fieldset>
    <div class="form-group col-md-12">
		<button class="btn btn-lg btn-success" type="button" onclick="beforeSubmitCheck()"> Save </button>
	</div>
</div>

<script type="text/javascript">
	function beforeSubmitCheck()
	{
		info = [];
		info[0] = 'Cusine';
		info[1] = 0;
		params = [];
		params[0] = 'name';
		params[1] = $("#CusineName").val();
		info[2] = params;
		$.ajax({
	        type: "post",
	        url: '<?php echo $this->webroot;?>cusines/checkDuplicateCusine',
	        dataType: "json",
	        data: {'data':info},
	        success: function (result) {
	            if (result == 0) {
	            	$("#CusineAddForm").submit();
	            }
	            else
	            {
	            	alert("Duplicate Name");
	            	$("#CusineName").val("");
	            }
	        },
	        error: function () {
				alert("Error Occurred");
	        }
	    });
	} 
    
</script>

