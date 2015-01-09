<?php //debug($restaurentOpeningHours); 
$i;$day=array();
foreach ($restaurentOpeningHours as $value) {
    $i=$value['restaurent_opening_hours']['operation_day'];
    // debug($i);
    $day[$i] = $value;
}

// debug($day);
// die();
?>
<style type="text/css">

td{padding:0px 10px;}
.timeLimit{display:none;}
 
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
<div class="row">
    <?php echo $this->Form->create('Restaurant', array('type' => 'file')); ?>
    <?php //echo $this->Html->script('api/postcode/SPL_AJAX_Full') ?>
    <fieldset>
        <legend><?php echo __('Add Restaurant'); ?></legend>
        <?php

            //restaurant info
            echo '<fieldset><legend>General Information</legend>';
            echo $this->Form->input('id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'hidden', 'class' => 'form-control'));
            echo $this->Form->input('name', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('promo_text', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            // echo $this->Form->input('open_time', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            // echo $this->Form->input('close_time', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            // echo $this->Form->input('store_close_day', array('div' => array('class' => 'form-group col-md-6'), 'list'=>'days','type' => 'text', 'class' => 'form-control'));
        ?>
        <datalist id="days">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Friday">Saturday</option>
            <option value="Friday">Sunday</option>
            <option value="Open Everyday">Everyday Open</option>
        </datalist>
        <div class="form-group col-md-12">
                <label>Shop Operation Day:</label>
                
                <div>
                    <table>
                        <tr>
                            <td>
                            <div class="radio">
                                <label>
                                    Open All Day <input type="checkbox" name="all" id="openAllDay">
                                </label>
                            </div>
                             </td>
                            <td><input type="text" class="defaultOpenTime"></td>
                            <td><input type="text" class="defaultCloseTime"></td>
                            <td><input type="button" value="Set Default Time" onclick="setTimeAll()" /></td>
                        </tr>
                        <tr>
                            <td><div class="label-control">Friday</div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[friday][operation_type]" class="close" value="close" data-id="friday_open" <?php if(isset($day['friday'])){if($day['friday']['restaurent_opening_hours']['operation_type'] =='close'){echo 'checked';}}else{echo 'checked';} ?>>Close Day</label></div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[friday][operation_type]" class="open" value="open" data-id="friday_open" <?php if(isset($day['friday'])){if($day['friday']['restaurent_opening_hours']['operation_type'] =='open'){echo 'checked';}} ?>>Open Day</label></div></td>
                            <td id="friday_open" class="timeLimit" <?php if(isset($day['friday'])){if($day['friday']['restaurent_opening_hours']['operation_type'] =='open'){echo "style='display:inline'";}} ?>>
                            <input type="text" id="friday_open" class="RestaurantOpenTime" placeholder="Opening time" name="store_operation_day[friday][open_hour]" value="<?php if(isset($day['friday'])){echo $day['friday']['restaurent_opening_hours']['open_hour'];} ?>">
                            <input type="text" id="friday_close" class="RestaurantCloseTime" placeholder="Closing time" name="store_operation_day[friday][close_hour]" value="<?php if(isset($day['friday'])){echo $day['friday']['restaurent_opening_hours']['close_hour'];} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><div class="label-control">Saturday</div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[saturday][operation_type]" class="close" value="close" data-id="saturday_open" <?php if(isset($day['saturday'])){if($day['saturday']['restaurent_opening_hours']['operation_type'] =='close'){echo 'checked';}}else{echo 'checked';} ?>>Close Day</label></div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[saturday][operation_type]" class="open" value="open" data-id="saturday_open" <?php if(isset($day['saturday'])){if($day['saturday']['restaurent_opening_hours']['operation_type'] =='open'){echo 'checked';}} ?>>Open Day</label></div></td>
                            <td id="saturday_open" class="timeLimit" <?php if(isset($day['saturday'])){if($day['saturday']['restaurent_opening_hours']['operation_type'] =='open'){echo "style='display:inline'";}} ?>>
                            <input type="text" class="RestaurantOpenTime" placeholder="Opening time" name="store_operation_day[saturday][open_hour]" value="<?php if(isset($day['saturday'])){echo $day['saturday']['restaurent_opening_hours']['open_hour']; }?>">
                            <input type="text" class="RestaurantCloseTime" placeholder="Closing time" name="store_operation_day[saturday][close_hour]" value="<?php if(isset($day['saturday'])){echo $day['saturday']['restaurent_opening_hours']['close_hour'];} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><div class="label-control">Sunday</div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[sunday][operation_type]" class="close" value="close" data-id="sunday_open" <?php if(isset($day['sunday'])){if($day['sunday']['restaurent_opening_hours']['operation_type'] =='close'){echo 'checked';}}else{echo 'checked';} ?>>Close Day</label></div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[sunday][operation_type]" class="open" value="open" data-id="sunday_open" <?php if(isset($day['sunday'])){if($day['sunday']['restaurent_opening_hours']['operation_type'] =='open'){echo 'checked';}} ?>>Open Day</label></div></td>
                            <td id="sunday_open" class="timeLimit" <?php if(isset($day['sunday'])){if($day['sunday']['restaurent_opening_hours']['operation_type'] =='open'){echo "style='display:inline'";}} ?>>
                            <input type="text" class="RestaurantOpenTime" placeholder="Opening time" name="store_operation_day[sunday][open_hour]" value="<?php if(isset($day['sunday'])){echo $day['sunday']['restaurent_opening_hours']['open_hour'];} ?>">
                            <input type="text" class="RestaurantCloseTime" placeholder="Closing time" name="store_operation_day[sunday][close_hour]" value="<?php if(isset($day['sunday'])){echo $day['sunday']['restaurent_opening_hours']['close_hour'];} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><div class="label-control">Monday</div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[monday][operation_type]" class="close" value="close" data-id="monday_open" <?php if(isset($day['monday'])){if($day['monday']['restaurent_opening_hours']['operation_type'] =='close'){echo 'checked';}}else{echo 'checked';} ?>>Close Day</label></div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[monday][operation_type]" class="open" value="open" data-id="monday_open" <?php if(isset($day['monday'])){if($day['monday']['restaurent_opening_hours']['operation_type'] =='open'){echo 'checked';}} ?>>Open Day</label></div></td>
                            <td id="monday_open" class="timeLimit" <?php if(isset($day['monday'])){if($day['monday']['restaurent_opening_hours']['operation_type'] =='open'){echo "style='display:inline'";}} ?>>
                            <input type="text" class="RestaurantOpenTime" placeholder="Opening time" name="store_operation_day[monday][open_hour]" value="<?php if(isset($day['monday'])){echo $day['monday']['restaurent_opening_hours']['open_hour']; }?>">
                            <input type="text" class="RestaurantCloseTime" placeholder="Closing time" name="store_operation_day[monday][close_hour]" value="<?php if(isset($day['monday'])){echo $day['monday']['restaurent_opening_hours']['close_hour'];} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><div class="label-control">Tuesday</div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[tuesday][operation_type]" class="close" value="close" data-id="tuesday_open" <?php if(isset($day['tuesday'])){if($day['tuesday']['restaurent_opening_hours']['operation_type'] =='close'){echo 'checked';}}else{echo 'checked';} ?>>Close Day</label></div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[tuesday][operation_type]" class="open" value="open" data-id="tuesday_open" <?php if(isset($day['tuesday'])){if($day['tuesday']['restaurent_opening_hours']['operation_type'] =='open'){echo 'checked';}} ?>>Open Day</label></div></td>
                            <td id="tuesday_open" class="timeLimit" <?php if(isset($day['tuesday'])){if($day['tuesday']['restaurent_opening_hours']['operation_type'] =='open'){echo "style='display:inline'";}} ?>>
                            <input type="text" class="RestaurantOpenTime" placeholder="Opening time" name="store_operation_day[tuesday][open_hour]" value="<?php if(isset($day['tuesday'])){echo $day['tuesday']['restaurent_opening_hours']['open_hour'];} ?>">
                            <input type="text" class="RestaurantCloseTime" placeholder="Closing time" name="store_operation_day[tuesday][close_hour]" value="<?php if(isset($day['tuesday'])){echo $day['tuesday']['restaurent_opening_hours']['close_hour'];} ?>">
                            </td> 
                        </tr>
                        <tr>
                            <td><div class="label-control">Wednesday</div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[wednesday][operation_type]" class="close" value="close" data-id="wednesday_open" <?php if(isset($day['wednesday'])){if($day['wednesday']['restaurent_opening_hours']['operation_type'] =='close'){echo 'checked';}}else{echo 'checked';} ?>>Close Day</label></div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[wednesday][operation_type]" class="open" value="open" data-id="wednesday_open" <?php if(isset($day['wednesday'])){if($day['wednesday']['restaurent_opening_hours']['operation_type'] =='open'){echo 'checked';}} ?>>Open Day</label></div></td>
                            <td id="wednesday_open" class="timeLimit" <?php if(isset($day['wednesday'])){if($day['wednesday']['restaurent_opening_hours']['operation_type'] =='open'){echo "style='display:inline'";}} ?>>
                            <input type="text" class="RestaurantOpenTime" placeholder="Opening time" name="store_operation_day[wednesday][open_hour]" value="<?php if(isset($day['wednesday'])){echo $day['wednesday']['restaurent_opening_hours']['open_hour'];} ?>">
                            <input type="text" class="RestaurantCloseTime" placeholder="Closing time" name="store_operation_day[wednesday][close_hour]" value="<?php if(isset($day['wednesday'])){echo $day['wednesday']['restaurent_opening_hours']['close_hour'];} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><div class="label-control">Thursday</div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[thursday][operation_type]" class="close" value="close" data-id="thursday_open" <?php if(isset($day['thursday'])){if($day['thursday']['restaurent_opening_hours']['operation_type'] =='close'){echo 'checked';}}else{echo 'checked';} ?>>Close Day</label></div></td>
                            <td><div class="radio"><label><input type="radio" name="store_operation_day[thursday][operation_type]" class="open" value="open" data-id="thursday_open" <?php if(isset($day['thursday'])){if($day['thursday']['restaurent_opening_hours']['operation_type'] =='open'){echo 'checked';}} ?>>Open Day</label></div></td>
                            <td id="thursday_open" class="timeLimit" <?php if(isset($day['thursday'])){if($day['thursday']['restaurent_opening_hours']['operation_type'] =='open'){echo "style='display:inline'";} }?>>
                            <input type="text" class="RestaurantOpenTime" placeholder="Opening time" name="store_operation_day[thursday][open_hour]" value="<?php if(isset($day['thursday'])){echo $day['thursday']['restaurent_opening_hours']['open_hour'];} ?>">
                            <input type="text" class="RestaurantCloseTime" placeholder="Closing time" name="store_operation_day[thursday][close_hour]" value="<?php if(isset($day['thursday'])){echo $day['thursday']['restaurent_opening_hours']['close_hour'];} ?>">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php
            echo $this->Form->input('Restaurant.photo', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'file', 'class' => 'form-control'));
            echo $this->Form->input('Restaurant.photo_dir', array('type' => 'hidden'));
            if(strlen(trim($this->data['Restaurant']['photo_dir'])) > 0)
            {
            	echo $this->Html->image('/files/restaurant/photo/' . $this->data['Restaurant']['id'] . '/' . $this->data['Restaurant']['photo']);
            }
            echo $this->Form->input('Cusine', array('div' => array('class' => 'form-group col-md-12'), 'class' => '','label'=>'Food Category'));

            echo '</fieldset>';


            //address
            echo '<fieldset><legend>Location</legend>';
            echo $this->Form->input('country_id', array('div' => array('class' => 'form-group col-md-3'), 'class' => 'form-control'));
            echo $this->Form->input('city_id', array('div' => array('class' => 'form-group col-md-3'), 'class' => 'form-control','label'=>'City/Town'));
            echo $this->Form->input('postal', array('label'=>'Post Code','div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control','onblur'=>'RESTAURENT_ACTION.loadLattitudeLongitude(this.value)'));
            echo $this->Form->input('area', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('address', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('lattitude', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control', 'onkeydown' => 'return false'));
            echo $this->Form->input('longitude', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control', 'onkeydown' => 'return false'));
            echo '</fieldset>';

            //contact
            echo '<fieldset><legend>Contact</legend>';
            echo $this->Form->input('phone', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('mobile', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('email', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('website', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo '</fieldset>';

            //order
            echo '<fieldset><legend>Order & Delivery</legend>';
            echo $this->Form->input('min_order', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('delivery_type', array('label'=>'Order Type','div' => array('class' => 'form-group col-md-3'), 'type' => 'select', 'class' => 'form-control', 'options'=>array('Delivery'=>'Delivery','Collection'=>'Collection','Delivery and Collection'=>'Delivery and Collection'),'selected'=>'Delivery and Collection'));
            echo $this->Form->input('delivery_time_starts_from', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('delivery_charge', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('delivery_amount', array('label'=>'Minimum Delivery Amount','div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('free_delivery_amount', array('div' => array('class' => 'form-group col-md-3'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('delivery_within', array('label'=>'Delivery Within','div' => array('class' => 'form-group col-md-3'), 'type' => 'select', 'class' => 'form-control', 'options'=>array('30 - 45 minutes'=>'30 - 45 minutes','45 - 60 minutes'=>'45 - 60 minutes'),'selected'=>'30 - 45 minutes'));
            echo '</fieldset>';
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>

<script>
    $(function () {

        $('.RestaurantOpenTime').timepicker({defaultTime:'11:00 AM'});
        $('.RestaurantCloseTime').timepicker({defaultTime:'11:00 PM'});
        $('.defaultOpenTime').timepicker({defaultTime:'11:00 AM'});
        $('.defaultCloseTime').timepicker({defaultTime:'11:00 PM'});
        $('#RestaurantDeliveryTimeStartsFrom').timepicker();

        $('#CusineCusine').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%',
            isOpen: false,
            placeholder: '',
            selectAll: true,
            selectAllText: 'Select all',
            selectAllDelimiter: ['[', ']'],
            allSelected: 'All selected',
            minimumCountSelected: 3,
            countSelected: '# of % selected',
            noMatchesFound: 'No matches found',
            multiple: true,
            multipleWidth: 150,
            single: false,
            filter: false,
           // width: undefined,
            maxHeight: 250,
            container: null,
            position: 'bottom',
            keepOpen: true,
            blockSeparator: '',
            displayValues: false,
            delimiter: ', '
        });
        
    });
    var RESTAURENT_ACTION = {
        loadLattitudeLongitude: function (postcode) {
            var mySplitResult = postcode.split("");
            var i_r = mySplitResult.length - 4;
            if (mySplitResult[i_r] != " ") {
                mySplitResult.splice(i_r + 1, 0, ' ');
            }
            postcode = mySplitResult.join('');
            $("#RestaurantPostal").val(postcode.toUpperCase());
            $("#RestaurantLattitude").val("");
            $("#RestaurantLongitude").val("");
            $.ajax({
                type: "post",
                url: '<?php echo $this->webroot;?>restaurants/findLatlngForPostCode',
                dataType: "json",
                data: {
                    postcode: postcode,
                },
                success: function (result) {
                    if (result != 0) {
                        $("#RestaurantLattitude").val(result.lat);
                        $("#RestaurantLongitude").val(result.lng);
                    }
                    
                },
                error: function () {

                }
            });
            
        }
    }

    // $(':radio').change(function (event) {
    // var id = $(this).data('id');
    // $('#' + id).toggleClass('timeLimit');
    // });

    $('#RestaurantPostal').autocomplete({
    serviceUrl: '<?php echo $this->webroot;?>restaurants/getPostCodeListAutoComplete',
    minChars:3,
    onSearchStart: function (query) {$(this).addClass("wait");},
    onSearchComplete: function (query, suggestions) {$(this).removeClass("wait");},
    });


    $('.open').click(function(){
        var id = $(this).data('id');
        $('#'+id).css('display','inline');
        $('#openAllDay').prop('checked',false);
    });
    $('.close').click(function(){
        var id = $(this).data('id');
        $('#'+id).css('display','none');
        $('#openAllDay').prop('checked',false);
    });

    $('#openAllDay').click(function(){
        if ($('#openAllDay').is(':checked') )
            {
                $('.close').prop('checked',false);
                $('.open').prop('checked',true);
                $('.timeLimit').css('display','inline');
            }
        else
            {
                $('.open').prop('checked',false);
                $('.close').prop('checked',true);
                $('.timeLimit').css('display','none');
            }
    });

    function setTimeAll()
    {
        var openT = $('.defaultOpenTime').val();
        var closeT = $('.defaultCloseTime').val();
        $('.RestaurantOpenTime').val(openT);
        $('.RestaurantCloseTime').val(closeT);
    }
</script>
