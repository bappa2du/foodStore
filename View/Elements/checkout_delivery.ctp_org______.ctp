<?php
    $user           = $this->UserAuth->getUser();
    $currentAddress = NULL;
    $cellPhone      = NULL;
    if(!empty($user))
    {
        $currentAddress = $user['User']['current_address'] . ', ' . $user['User']['city'] . '-' . $user['User']['postal'] . ', ' . $user['User']['country'];
        $cellPhone      = $user['User']['cell_phone'];
    }
?>

<div class="panel panel-myshop">
    <div class="panel-heading">
        <h3>Checkout Delivery</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <?php echo $this->Form->input('delivery_address', array('div' => array('class' => 'form-group 12col login'), 'value' => $currentAddress, 'type' => 'textarea', 'class' => 'form-control'));
                ?>

                <div class="form-group 12col login">
                    <label for="other_direction">Post code</label>
                    <?php echo $this->Form->input('delivery_other_direction', array('label' => false, 'class' => 'form-control', 'type' => 'text')); ?>
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
                    <!-----select time ------>
                    <div class="select-time">
                        <select id="select_time" class="form-control">
                            <option>1:00:00 - 2:00:00</option>
                            <option>2:00:00 - 3:00:00</option>
                            <option>3:00:00 - 4:00:00</option>
                            <option>4:00:00 - 5:00:00</option>
                            <option>5:00:00 - 6:00:00</option>
                            <option>6:00:00 - 7:00:00</option>
                            <option>7:00:00 - 8:00:00</option>
                            <option>8:00:00 - 9:00:00</option>
                            <option>9:00:00 - 10:00:00</option>
                            <option>10:00:00 - 11:00:00</option>
                            <option>11:00:00 - 12:00:00</option>
                            <option>12:00:00 - 13:00:00</option>
                            <option>13:00:00 - 14:00:00</option>
                            <option>14:00:00 - 15:00:00</option>
                            <option>15:00:00 - 16:00:00</option>
                            <option>16:00:00 - 17:00:00</option>
                            <option>17:00:00 - 18:00:00</option>
                            <option>18:00:00 - 19:00:00</option>
                            <option>19:00:00 - 20:00:00</option>
                            <option>20:00:00 - 21:00:00</option>
                            <option>21:00:00 - 22:00:00</option>
                            <option>22:00:00 - 23:00:00</option>
                            <option>23:00:00 - 24:00:00</option>
                            <option>24:00:00 - 1:00:00</option>
                        </select>
                    </div>
                    <!-----end of select time ------>
                </div>
            </div>
        </div>
    </div>
</div>


