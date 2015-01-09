<?php
    $user           = $this->UserAuth->getUser();
    $currentAddress = NULL;
    $cellPhone      = NULL;
    if(!empty($user))
    {
        $currentAddress = $user['User']['current_address'];// . ', ' . $user['User']['city'] . '-' . $user['User']['postal'] . ', ' . $user['User']['country'];
        if($user['User']['city'])
        {
            $currentAddress .= "," . $user['User']['city'];
        }
        if($user['User']['postal'])
        {
            $currentAddress .= "," . $user['User']['postal'];
        }
        if($user['User']['country'])
        {
            $currentAddress .= "," . $user['User']['country'];
        }
        $cellPhone = $user['User']['cell_phone'];
    }
?>

<style>
    .SPLAddressListSt option {
        background: #ddd;
        padding: 5px;
        margin: 2px;
    }
</style>
<div class="panel panel-myshop">
    <div class="panel-heading">
        <h3>Checkout Delivery</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group 12col login">
                    <label for="other_direction">Post code <span style="color:red">*</span></label>

                    <?php echo $this->Form->input('delivery_other_direction', array('id' => 'postcode', 'label' => false, 'class' => 'form-control pull-left', 'type' => 'text', 'value' => $user['User']['postal'])); ?>

                    <span class="pull-left">&nbsp;&nbsp;</span>
                    <input class="btn btn-default pull-left" type="button" value="Find Address" onclick="Javascript:SPLGetAddressData(document.getElementById('postcode').value)"/>
                </div>
                <div style="margin-top: 50px;">
                    <label for="other_direction">Delivery Address <span style="color:red">*</span></label>

                    <?php echo $this->Form->input('delivery_address', array('label' => false, 'value' => $currentAddress, 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Delivery Address'));
                    ?>
                </div>
            </div>
            <div class="col-md-12">
                <?php
                    echo $this->Form->input('delivery_type', array('onchange' => 'toggleDeliverydetail();', 'div' => array('class' => 'form-group 12col login'), 'type' => 'select', 'class' => 'form-control',
                                                                   'options'  => array(
                                                                       'Delivery'   => 'Delivery',
                                                                       'Collection' => 'Collection',
                                                                   )
                    ));
                ?>

                <div class="form-group ">
                    <label>Delivery Time </label>

                    <div class="radio">
                        <label>
                            <input type="radio" value="0" name="delivery_time" class="deliveryTime" checked="checked"> ASAP
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" value="1" name="delivery_time" class="deliveryTime"> Choose Time
                        </label>
                    </div>
                </div>
                <div class="form-group" id="display_select_time">
                    <!---select time -->
                    <div class="select-time">
                        <select id="select_time" class="form-control">
                            <?php
                                $selectedTime = "12:15";
                                for($i = 15; $i < 670; $i += 15)
                                {
                                    $endTime = strtotime("$i minutes", strtotime($selectedTime));

                                    echo "<option>" . " &nbsp; " . date('h:i A', $endTime) . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <!---end of select time -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Postcode API (Start) -->

<?php echo $this->Html->script('api/postcode/SPL_AJAX_Full') ?>


<div class="panel panel-myshop" id="panel_search_address">
    <div class="panel-heading">
        <h3>Select Address</h3>
    </div>
    <div class="alert">
        <!-- Important for showing Post API data -->
        <div id="SPLSearchArea"></div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group coustome-group">
                    <label for="postcode_company">Company</label>
                    <?php echo $this->Form->input('postcode_company', array('id' => 'postcode_company', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group coustome-group">
                    <label for="postcode_line1">Line 1 <span style="color:red">*</span></label>
                    <?php echo $this->Form->input('postcode_line1', array('id' => 'postcode_line1', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group coustome-group">
                    <label for="postcode_line2">Line 2</label>
                    <?php echo $this->Form->input('postcode_line2', array('id' => 'postcode_line2', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group coustome-group">
                    <label for="postcode_line3">Line 3</label>
                    <?php echo $this->Form->input('postcode_line3', array('id' => 'postcode_line3', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group coustome-group">
                    <label for="postcode_town">Town <span style="color:red">*</span></label>
                    <?php echo $this->Form->input('postcode_town', array('id' => 'postcode_town', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group coustome-group">
                    <label for="postcode_county">County</label>
                    <?php echo $this->Form->input('postcode_county', array('id' => 'postcode_county', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group coustome-group">
                    <label for="postcode_country">Country</label>
                    <?php echo $this->Form->input('postcode_country', array('id' => 'postcode_country', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group coustome-group">
                    <label for="postcode_memo_address">Memo Address <span style="color:red">*</span></label>
                    <?php echo $this->Form->input('postcode_memo_address', array('type' => 'textarea', 'id' => 'postcode_memo_address', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Postcode API (End) -->